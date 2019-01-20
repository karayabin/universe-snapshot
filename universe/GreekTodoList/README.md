GreekTodoList
======================
2017-07-27


A simple todolist tool for small projects.


This is part of the [universe framework](https://github.com/karayabin/universe-snapshot).


Install
==========
Using the [uni](https://github.com/lingtalfi/universe-naive-importer) command.
```bash
uni import GreekTodoList
```

Or just download it and place it where you want otherwise.


How to
==========

It's a simple todolist to show where you're at.

The objects organization is the following:

The TodoList object contains any number of TaskList objects.
The TaskList object contains any number of Task objects.
The Task object can contain any number of Task objects (called subtasks).

Generally, we don't need more than one level of subtasks, but technically, it's recursive.


So, the Task object is the foundation brick of this system.
It contains the following properties:

- label
- nbDays
- dev (the developper assigned to complete the task)
- isCurrent (is this the current task?)
- isDone
- comment (any comment about that task?)
- dateAdded (you might not have anticipated every task, so if you add one, you know WHEN you added it)
- subTasks (children)

Rendering is up to you.

Here is the real life example which originated the creation of the GreekTodoList tool.





```php
<?php


use GreekTodoList\Task;
use GreekTodoList\TaskList;
use GreekTodoList\TodoList;


require_once __DIR__ . "/../boot.php";
require_once __DIR__ . "/../init.php";


$todo = TodoList::create()->addTaskList(
    TaskList::create()->setLabel("Intégration")
        ->addTask(Task::create()->setLabel("carousel produits")->setNbDays(2))
        ->addTask(Task::create()->setLabel("Intégration pages mon compte")
            ->addSubTask(Task::create()->setLabel("compte")->setNbDays(2)->setIsDone('2017-07-26'))
            ->addSubTask(Task::create()->setLabel("coordonnées")->setNbDays(2)->setIsCurrent())
            ->addSubTask(Task::create()->setLabel("email & mot de passe")->setNbDays(1))
            ->addSubTask(Task::create()->setLabel("moyens de paiement")->setNbDays(3))
            ->addSubTask(Task::create()->setLabel("newsletter")->setNbDays(1))
            ->addSubTask(Task::create()->setLabel("mes points fidélité")->setNbDays(1))
            ->addSubTask(Task::create()->setLabel("suivi commandes")->setNbDays(3))
            ->addSubTask(Task::create()->setLabel("mes factures")->setNbDays(2))
            ->addSubTask(Task::create()->setLabel("mon dossier de formation")->setNbDays(2))
            ->addSubTask(Task::create()->setLabel("mes manuels de formation")->setNbDays(2))
            ->addSubTask(Task::create()->setLabel("mes devis")->setNbDays(1))
        )
        ->addTask(Task::create()->setLabel("Intégration des pages du footer")->setNbDays(5)->setComment("demander à l'équipe de les faire")))
    ->addTaskList(
        TaskList::create()->setLabel("Fonctionalités")
            ->addTask(Task::create()->setLabel("Correction fiche produits formation")->setNbDays(2))
            ->addTask(Task::create()->setLabel("Correction fiche produits events")->setNbDays(2))
            ->addTask(Task::create()->setLabel("module recherche carte formation")->setNbDays(2))
            ->addTask(Task::create()->setLabel("module recherche carte events")->setNbDays(2))
            ->addTask(Task::create()->setLabel("moteur de recherche")->setNbDays(3))
            ->addTask(Task::create()->setLabel("fiche produit équipement cross sells")->setNbDays(2))
            ->addTask(Task::create()->setLabel("traduction")->setNbDays(4))
    )
    ->addTaskList(TaskList::create()->setLabel("Monétisation")
        ->addTask(Task::create()->setLabel("intégration paypal")->setNbDays(5))
        ->addTask(Task::create()->setLabel("intégration carte bancaire alias")->setNbDays(2))
        ->addTask(Task::create()->setLabel("système synchronisation statut des commandes")->setNbDays(3)->setDateAdded("2017-07-26")))
    ->addTaskList(TaskList::create()->setLabel("Mails et pdf")
        ->addTask(Task::create()->setLabel("notification création compte")->setNbDays(1))
        ->addTask(Task::create()->setLabel("mot de passe oublié")->setNbDays(1))
        ->addTask(Task::create()->setLabel("confirmation achat")->setNbDays(1))
        ->addTask(Task::create()->setLabel("confirmation devis")->setNbDays(1))
        ->addTask(Task::create()->setLabel("commande envoyée")->setNbDays(1))
        ->addTask(Task::create()->setLabel("pdf facture")->setNbDays(2))
        ->addTask(Task::create()->setLabel("pdf devis")->setNbDays(2)))
    ->addTaskList(TaskList::create()->setLabel("Finition")
        ->addTask(Task::create()->setLabel("couche design, et corrections")->setNbDays(5))
        ->addTask(Task::create()->setLabel("tests utilisateur et correction")->setNbDays(3)))
    ->addTaskList(TaskList::create()->setLabel("Extra")
        ->addTask(Task::create()->setLabel("Tâches diverses")->setNbDays(7)));





?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>


        table {
            border-collapse: collapse;
            border: 1px solid black;
        }

        tr, td, th {
            border: 1px solid black;
            text-align: left;
        }

        td, th {
            padding: 5px;
        }

        tr.indent-1 td:first-child {
            padding-left: 45px;
        }

        tr.indent-1 td:first-child::before {
            content: "- "
        }

        body > table tr td:nth-child(1) {
            width: 300px;
        }

        body > table tr td:nth-child(2) {
            width: 50px;
        }

        tr.done td {
            text-decoration: line-through;
            background: #45ff00;
            color: black;
        }

        tr.current td {
            background: #41749f;
            color: white;
        }

        .done-color {
            background: #45ff00;
            padding: 5px;
        }

        .current-color {
            background: #41749f;
            padding: 5px;
        }


    </style>
</head>

<body>

<h1>Liste des tâches techniques et estimation du temps</h1>
<span class="date">2017-07-26</span>


<p>
    Cette page sera mise en temps réel jusqu'à la mise en production du site.<br>
    Chaque fois qu'une tâche sera exécutée, elle sera barrée et mise de cette couleur <span
            class="done-color">&nbsp;</span>, de manière à ce que nous puissions estimer la progression
    et la quantité de travail restant.<br>
    Les tâches ne sont pas nécessairement exécutées dans l'ordre.<br>
    La tâche en cours d'exécution aura un fond de cette couleur: <span class="current-color">&nbsp;</span>
</p>

<div class="summary">Nombre total de jours estimés: <span class="nbday"><?php echo $todo->getNbTotalDays(); ?>j+</span>
</div>
<div class="summary">Nombre total de jours restants estimés: <span
            class="nbday"><?php echo $todo->getNbTotalDays(true); ?>j+</span>
</div>


<h1 style="margin-top: 50px;">Planning interactif</h1>
<?php foreach ($todo->getTaskLists() as $taskList): ?>
    <h2><?php echo $taskList->getLabel(); ?>: <span class="nbday"><?php echo $taskList->getNbTotalDays(); ?>j</span>
    </h2>
    <table>
        <tr>
            <th>Tâche</th>
            <th>Nombre de jours estimés</th>
            <th>Commentaire</th>
            <th>Ajoutée le</th>
            <th>Terminée le</th>
            <th>Développeur</th>
        </tr>
        <?php foreach ($taskList->getTasks() as $task):

            $sDone = (true === $task->isDone()) ? 'done' : '';
            $sCurrent = (true === $task->isCurrent()) ? 'current' : '';
            $sClass = $sDone . ' ' . $sCurrent;

            ?>

            <?php if ($task->isParent()): ?>
            <tr class="<?php echo $sClass; ?>">
                <td><?php echo $task->getLabel(); ?></td>
                <td><?php echo $task->getTotalNbDays(); ?></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <?php foreach ($task->getSubTasks() as $subTask):
                $sDone = (true === $subTask->isDone()) ? 'done' : '';
                $sCurrent = (true === $subTask->isCurrent()) ? 'current' : '';
                $sClass = $sDone . ' ' . $sCurrent;
                ?>
                <tr class="indent-1 <?php echo $sClass; ?>">
                    <td><?php echo $subTask->getLabel(); ?></td>
                    <td><?php echo $subTask->getTotalNbDays(); ?></td>
                    <td><?php echo $subTask->getComment(); ?></td>
                    <td><?php echo $subTask->getDateAdded(); ?></td>
                    <td><?php echo $subTask->getDateDone(); ?></td>
                    <td><?php echo $subTask->getDev(); ?></td>
                </tr>
            <?php endforeach; ?>


        <?php else: ?>
            <tr class="<?php echo $sClass; ?>">
                <td><?php echo $task->getLabel(); ?></td>
                <td><?php echo $task->getTotalNbDays(); ?></td>
                <td><?php echo $task->getComment(); ?></td>
                <td><?php echo $task->getDateAdded(); ?></td>
                <td><?php echo $task->getDateDone(); ?></td>
                <td><?php echo $task->getDev(); ?></td>
            </tr>
        <?php endif; ?>
        <?php endforeach; ?>
    </table>
<?php endforeach; ?>


</body>
</html>


```





History Log
------------------
    
- 1.4.0 -- 2017-08-25

    - add TodoList.getEstimatedEndDate ignoreDoneDays argument
    
- 1.3.0 -- 2017-08-09

    - add Task.dateStarted property
    
- 1.2.0 -- 2017-07-30

    - add TodoList.getStartDate and TodoList.getEstimatedEndDate methods
    
- 1.1.0 -- 2017-07-27

    - change Task.setIsDone now takes a date as its argument
    - add Task.getDoneDate method
    
- 1.0.0 -- 2017-07-27

    - initial commit