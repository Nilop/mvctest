<?php

namespace App\Classes;

class E404Exception
    extends ModelException
{
    protected $code = 404;
}