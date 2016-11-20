<?php


use Tim\TimServer\OpaqueTimServer;
use Tim\TimServer\TimServerInterface;

require_once "bigbang.php"; // start the local universe
OpaqueTimServer::create()->start(function (TimServerInterface $server) {
    
    $lorems = [
        'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam autem culpa debitis dolorem eaque earum incidunt laborum, minus modi, odio perferendis perspiciatis sequi, sunt tempora tempore tenetur vel vitae voluptatum.',
        'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores aut dolorum eius esse explicabo fugiat, fugit ipsa molestiae molestias nesciunt omnis optio provident qui quibusdam repellendus saepe tempore? Iure, numquam!',
        'Lorem ipsum dolor sit amet, consectetur adipisicing elit. A autem, consequatur consequuntur dolorum facere iusto labore minus quas? Deleniti expedita laboriosam nam nisi officiis optio reprehenderit saepe, unde. Deserunt, vero?',
        'Lorem ipsum dolor sit amet, consectetur adipisicing elit. A ad consequuntur cupiditate doloribus ducimus eius eligendi enim error est in laudantium porro quam, quas quidem recusandae sapiente suscipit, temporibus voluptatibus.',
        'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis earum, ex illum itaque neque quae quaerat? At aut consequatur consequuntur et, exercitationem facilis ipsam porro praesentium, quia quis, sapiente ullam?',
        'Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aspernatur, dignissimos doloremque dolores doloribus eum harum hic, id in libero nesciunt nihil nostrum obcaecati officia, provident. Debitis eum ipsam quis?',
        'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium dolorem doloremque, ducimus eius enim et ex facilis fuga impedit ipsam libero maiores minus natus nobis nulla officia perferendis quasi voluptatum?',
    ];

    $server->success(str_repeat($lorems[array_rand($lorems)], rand(1, 10)));
    
    
})->output();



