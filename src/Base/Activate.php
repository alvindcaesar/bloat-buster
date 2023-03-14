<?php

namespace Bloatbuster\Base;

class Activate
{
  public static function activate()
  {
    flush_rewrite_rules();
  }
}

