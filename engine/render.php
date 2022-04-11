<?php

function render($page, $params = [])
{
    return renderTemplate(LAYOUTS_DIR . 'main', [
            'title' => $params['title'],
            'content' => renderTemplate($page, $params),
            'menu' => renderTemplate('menu', $params = [
                'counter' => getCountCart(session_id()),
                'admin'=> is_admin(),
                'user'=> getUser()
            ])
        ]
    );
}

function renderTemplate($page, $params = []) {

    ob_start();

    extract($params);
    /*foreach ($params as $key => $value)  $$key = $value;*/

    include TEMPLATES_DIR . $page . ".php";

    return ob_get_clean();

}

