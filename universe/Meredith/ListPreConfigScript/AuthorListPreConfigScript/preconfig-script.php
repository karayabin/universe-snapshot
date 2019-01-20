<script>
    window.meredithRegistry.buttons = [

        <?php  
        
            /**
            * @var ListButtonCodeInterface[] $buttons
            */
            use Meredith\ListButtonCode\ListButtonCodeInterface;
            
            
            $c = 0;
            foreach($buttons as $b){
                if(0 !== $c){
                    echo "," . PHP_EOL;
                }
                echo $b->render();
                $c++;
            }
        
        ?>
    ];


    <?php if($lengthMenu): ?>
    window.meredithRegistry.lengthMenu = <?php echo json_encode($lengthMenu); ?>;
    <?php endif; ?>

    <?php if($pageLength): ?>
    window.meredithRegistry.pageLength = <?php echo $pageLength; ?>;
    <?php endif; ?>


</script>