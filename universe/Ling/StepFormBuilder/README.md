StepFormBuilder
===========
2017-08-22 -> 2021-03-05



A helper to implement a form composed of multiple steps.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


[![step-form-builder.png](http://lingtalfi.com/img/universe/StepFormBuilder/step-form-builder.png)](http://lingtalfi.com/img/universe/StepFormBuilder/step-form-builder.png)


Install
==========
Using the [planet installer](https://github.com/lingtalfi/Light_PlanetInstaller) via [light-cli](https://github.com/lingtalfi/Light_Cli)
```bash
lt install Ling.StepFormBuilder
```

Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import Ling/StepFormBuilder
```

Or just download it and place it where you want otherwise.


Why?
==========

I created this planet because while implementing our own e-commerce solution, in order
to help with the checkout process.

Do you know the one page checkout? You have the following steps:

- login
- shipping
- billing

And some steps might contain other steps, for instance in our company we had an extra training step
composed of three forms, so our scheme was more like this:

- login
- (training)
    - training-step-1
    - training-step-2
    - training-step-3
- shipping
- billing


I already had a MVC form logic with the help of the [OnTheFlyForm planet](https://github.com/lingtalfi/OnTheFlyForm),
but I wanted to delegate the navigation part of the checkout process to an external object: the StepFormBuilder.


The Rules
==============

The StepFormBuilder's behaviour strictly conforms to a set of rules:

- Let P mean previous button
- Let N mean next button
- we use only static (not ajax) form in this implementation
- All steps are registered in the order in which they should appear
- P.click goes to the previous step unconditionally (if there is no previous step it remains on the same step)
- N.click post the form; if the form is valid:
                    - it stores the data in the pool 
                    - it assign the "done" state to this step 
                    - it goes to the next step
                            If there is no next step, then it means the StepFormBuilder has been successfully completed.
- the "done" state can only be removed using the reset method                            
- Steps can be grouped together (like training-step-1, training-step-2 and training-step-3 in the above example)
- click on a step's title goes directly to the step, but only if the step is already done; otherwise it doesn't do anything
- when you land on a step group by clicking on the step's title, you always land on the first step 




How to
==========

That's all for the theory, and now the above example in code.
Don't mind the first two require_once, they belong to the [kamille framework](https://github.com/lingtalfi/kamille) (they basically initialize the
autoloader)



```php 
<?php

use Ling\Authenticate\SessionUser\SessionUser;
use Ling\Bat\SessionTool;
use Module\Ekom\Api\EkomApi;
use Module\Ekom\Utils\OrderBuilder\OrderBuilder;
use Module\Ekom\Utils\OrderBuilder\Step\MockOrderBuilderStep;
use Module\EkomUserProductHistory\Api\EkomUserProductHistoryApi;
use Module\EkomUserProductHistory\UserProductHistory\Entry\Entry;
use Module\EkomUserProductHistory\UserProductHistory\FileSystemUserProductHistory;
use Ling\OnTheFlyForm\Helper\OnTheFlyFormHelper;
use Ling\OnTheFlyForm\OnTheFlyForm;
use Ling\StepFormBuilder\PrototypeStepFormBuilder;
use Ling\StepFormBuilder\Step\OnTheFlyFormStep;
use Ling\StepFormBuilder\StepFormBuilderInterface;


require_once __DIR__ . "/../boot.php";
require_once __DIR__ . "/../init.php";





$builder = new PrototypeStepFormBuilder();
$builder->registerStep('login', OnTheFlyFormStep::create()->setForm(OnTheFlyForm::create([
    "login",
], 'login-key')
    ->setValidationRules([
        'login' => ['required'],
    ])
));


$builder->registerStep('training1', OnTheFlyFormStep::create()->setForm(OnTheFlyForm::create([
    "motivation",
], 'motivation-key')
    ->setValidationRules([
        'motivation' => ['required'],
    ])
));
$builder->registerStep('training2', OnTheFlyFormStep::create()->setForm(OnTheFlyForm::create([
    "provenance",
], 'provenance-key')
    ->setValidationRules([
        'provenance' => ['required'],
    ])
));
$builder->registerStep('training3', OnTheFlyFormStep::create()->setForm(OnTheFlyForm::create([
    "explanations",
], 'explanations-key')
    ->setValidationRules([
        'explanations' => ['required'],
    ])
));


$builder->registerStep('shipping', OnTheFlyFormStep::create()->setForm(OnTheFlyForm::create([
    "shipping_mode",
], 'shipping-mode-key')
    ->setValidationRules([
        'shipping_mode' => ['required'],
    ])
));

$builder->registerStep('payment', OnTheFlyFormStep::create()->setForm(OnTheFlyForm::create([
    "payment_mode",
], 'payment-mode-key')->setValidationRules([
    'payment_mode' => ['required'],
])));



$builder->addGroup(['training1', 'training2', 'training3']);

class StepRenderer
{

    protected $title;

    /**
     * @var StepFormBuilderInterface
     */
    protected $builder;

    protected $id;


    public function __construct()
    {
        $this->title = "no title";
        $this->id = null;
        $this->builder = null;
    }


    public static function create(StepFormBuilderInterface $builder)
    {
        $o = new static();
        $o->builder = $builder;
        return $o;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }


    public function getBuilder()
    {
        return $this->builder;
    }

    public function displayBarFormLink(StepFormBuilderInterface $builder)
    {
        $id = $this->getId();
        $stepKey = $builder->getStepKey();
        ?>
        <form method="post" action="">
            <a href="#">Go to this step</a>
            <input type="hidden" name="<?php echo $stepKey; ?>" value="<?php echo $id; ?>">
        </form>
        <?php
    }


    public function displayBar(StepFormBuilderInterface $builder)
    {
        $id = $this->getId();
        ?>
        <div class="bar"><?php echo $this->title; ?> (<?php echo $builder->getStepState($id); ?>)
            <?php $this->displayBarFormLink($builder); ?>
        </div>
        <?php
        return $this;
    }

    public function displayModel(array $model)
    {
        ?>Default display<?php
        return $this;
    }


    public function displayButtons(array $model, $prev = true, $next = true)
    {
        if (true === $prev) {
            ?>
            <button type="submit" name="<?php echo $this->getBuilder()->getPrevStepKey(); ?>" value="1">Previous
            </button>
            <?php
        }
        if (true === $next) {
            ?>
            <button type="submit">Next</button>
            <?php
        }

        OnTheFlyFormHelper::generateKey($model);
    }

    private function getId()
    {
        if (null === $this->id) {
            $class = get_called_class();
            $class = str_replace('StepRenderer', '', $class);
            $this->id = strtolower($class);
        }
        return $this->id;
    }

}

class LoginStepRenderer extends StepRenderer
{
    public function __construct()
    {
        parent::__construct();
        $this->title = "login";
    }

    public function displayModel(array $model)
    {
        $m = $model;
        ?>
        <form method="post" action="">
            Login: <input name="<?php echo $m['nameLogin']; ?>" value="<?php echo $m['valueLogin']; ?>">
            <?php $this->displayButtons($model); ?>
        </form>
        <?php
        return $this;
    }
}

class TrainingStepRenderer extends StepRenderer
{
    protected $steps;

    public function __construct()
    {
        parent::__construct();
        $this->title = "training";
        $this->steps = [];
    }

    public function displayBar(StepFormBuilderInterface $builder)
    {
        ?>
        <div class="bar"><?php echo $this->title; ?> (composed)
            <?php $this->displayBarFormLink($builder); ?>
        </div>
        <?php
        return $this;
    }

    public function setSteps($steps)
    {
        $this->steps = $steps;
        return $this;
    }


    public function render(StepFormBuilderInterface $builder)
    {
        $trainingRenderer1 = TrainingStep1Renderer::create($builder);
        $trainingRenderer2 = TrainingStep2Renderer::create($builder);
        $trainingRenderer3 = TrainingStep3Renderer::create($builder);
        //
        if ('active' === $builder->getStepState('training1')) {
            $model = $builder->getStepModel('training1');
            $trainingRenderer1->displayModel($model);
        } elseif ('active' === $builder->getStepState('training2')) {
            $model = $builder->getStepModel('training2');
            $trainingRenderer2->displayModel($model);
        } elseif ('active' === $builder->getStepState('training3')) {
            $model = $builder->getStepModel('training3');
            $trainingRenderer3->displayModel($model);
        }
    }

}

class TrainingStep1Renderer extends StepRenderer
{

    public function displayModel(array $model)
    {
        $m = $model;
        ?>
        <form method="post" action="">
            Training - motivation: <input name="<?php echo $m['nameMotivation']; ?>"
                                          value="<?php echo $m['valueMotivation']; ?>">
            <?php $this->displayButtons($model); ?>
        </form>
        <?php
        return $this;
    }
}

class TrainingStep2Renderer extends StepRenderer
{

    public function displayModel(array $model)
    {
        $m = $model;
        ?>
        <form method="post" action="">
            Training - provenance: <input name="<?php echo $m['nameProvenance']; ?>"
                                          value="<?php echo $m['valueProvenance']; ?>">
            <?php $this->displayButtons($model); ?>
        </form>
        <?php
        return $this;
    }
}

class TrainingStep3Renderer extends StepRenderer
{

    public function displayModel(array $model)
    {
        $m = $model;
        ?>
        <form method="post" action="">
            Training - explanations: <input name="<?php echo $m['nameExplanations']; ?>"
                                            value="<?php echo $m['valueExplanations']; ?>">
            <?php $this->displayButtons($model); ?>
        </form>
        <?php
        return $this;
    }
}


class ShippingStepRenderer extends StepRenderer
{
    public function __construct()
    {
        parent::__construct();
        $this->title = "shipping";
    }

    public function displayModel(array $model)
    {
        $m = $model;
        ?>
        <form method="post" action="">
            Shipping mode: <input name="<?php echo $m['nameShippingMode']; ?>"
                                  value="<?php echo $m['valueShippingMode']; ?>">
            <?php $this->displayButtons($model); ?>
        </form>
        <?php
        return $this;
    }
}

class PaymentStepRenderer extends StepRenderer
{
    public function __construct()
    {
        parent::__construct();
        $this->title = "payment";
    }

    public function displayModel(array $model)
    {
        $m = $model;
        ?>
        <form method="post" action="">
            Payment mode: <input name="<?php echo $m['namePaymentMode']; ?>"
                                 value="<?php echo $m['valuePaymentMode']; ?>">
            <?php $this->displayButtons($model); ?>
        </form>
        <?php
        return $this;
    }
}




?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Title</title>
        <script
                src="https://code.jquery.com/jquery-3.2.1.js"
                integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
                crossorigin="anonymous">
        </script>
        <style>
            .bar {
                background: #eee;
                margin-bottom: 5px;
            }

            .bar form {
                display: inline-block;
                margin-left: 100px;
            }
        </style>
    </head>

    <body>
    <?php
    $loginRenderer = LoginStepRenderer::create($builder)->displayBar($builder);
    if ('active' === $builder->getStepState('login')) {
        $model = $builder->getStepModel('login');
        $loginRenderer->displayModel($model);
    }
    $trainingRenderer = TrainingStepRenderer::create($builder)->setId("training1")->displayBar($builder)->setSteps([
        TrainingStep1Renderer::create($builder),
        TrainingStep2Renderer::create($builder),
        TrainingStep3Renderer::create($builder),
    ]);

    if (
        'active' === $builder->getStepState('training1') ||
        'active' === $builder->getStepState('training2') ||
        'active' === $builder->getStepState('training3')
    ) {
        $trainingRenderer->render($builder);
    }

    $shippingRenderer = ShippingStepRenderer::create($builder)->displayBar($builder);
    if ('active' === $builder->getStepState('shipping')) {
        $model = $builder->getStepModel('shipping');
        $shippingRenderer->displayModel($model);
    }
    $paymentRenderer = PaymentStepRenderer::create($builder)->displayBar($builder);
    if ('active' === $builder->getStepState('payment')) {
        $model = $builder->getStepModel('payment');
        $paymentRenderer->displayModel($model);
    }
    ?>

    <form method="post" action="">
        <input type="hidden" name="<?php echo $builder->getResetKey(); ?>" value="1">
        <button type="submit" id="reset">Reset</button>
    </form>

    <script>
        document.addEventListener("DOMContentLoaded", function (event) {
            $(document).ready(function () {
                $('a').on('click', function () {
                    $(this).parent().submit();
                    return false;
                });

                $('#reset').on('click', function () {
                    $(this).parent().submit();
                    return false;
                });
            });
        });
    </script>
    </body>
    </html>
<?php

$builder->debug();
```









History Log
------------------

- 1.1.3 -- 2021-03-05

    - update README.md, add install alternative

- 1.1.2 -- 2020-12-08

    - Fix lpi-deps not using natsort.

- 1.1.1 -- 2020-12-04

    - Add lpi-deps.byml file

- 1.1.0 -- 2017-08-22

    - update OnTheFlyFormStep now accepts callback as form 
    - add StepFormBuilderInterface.setActiveStep method 
    
- 1.0.2 -- 2017-08-22

    - removed debug strings in StepFormBuilder 
    
- 1.0.1 -- 2017-08-22

    - add OnTheFlyFormStep.onSuccessfulValidateAfter protected method
    
- 1.0.0 -- 2017-08-22

    - initial commit