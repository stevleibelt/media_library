<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2014-03-27 
 */

namespace Controller;

class Authentication extends AbstractController
{
    public function login()
    {
        return 'login';
    }

    public function logout()
    {
        return 'logout';
    }
}