<?php
function sendText($text){
    $arr = array (
      'messages' => 
      array (
        0 => 
        array (
          'text' => $text,
        ),
      ),
    );
    echo json_encode($arr);
    
}
// Send 2 button. 1 is Link, the other call next block
function sendButton($text,$link,$postback){
    $arr = array (
          'messages' => 
          array (
            0 => 
            array (
              'attachment' => 
              array (
                'type' => 'template',
                'payload' => 
                array (
                  'template_type' => 'button',
                  'text' => $text,
                  'buttons' => 
                  array (
                    0 => 
                    array (
                      'type' => 'web_url',
                      'url' => $link,
                      'title' => 'Get Link'
                    ),
                    1 => 
                    array (
                      'type' => 'json_plugin_url',
                      'url' => $postback,
                      'title' => 'Không, cái khác cơ'
                    ),
                  ),
                ),
              ),
            ),
          ),
        );
    echo json_encode($arr);
}
