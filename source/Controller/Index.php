<?php
/**
 * @author stev leibelt <artodeto@bazzline.net>
 * @since 2014-03-27 
 */

namespace Controller;


class Index extends AbstractController
{
    /**
     * @url GET /api/all
     * @return string
     */
    public function get()
    {
        return 'you have called me with ' . implode(', ', func_get_args());
    }
} 