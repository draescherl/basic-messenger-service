<?php

/** 
 * A function that gets the path to the file given as a parameter by adding the path to the view folder
 * 
 * @param string $page_name The name of the view you want to access
 * @return string Full path to the file
*/
function get_page(string $page_name = "") : string
{
    return $GLOBALS['view'] . $page_name;
}



function login()
{
    require get_page('auth/login.php');
}

function logout()
{
    require get_page('auth/logout.php');
}

function register()
{
    require get_page('auth/register.php');
}



function admin()
{
    require get_page('admin.php');
}

function home()
{
    require get_page('home.php');
}



function error_404()
{
    require get_page('errors/404.php');
}