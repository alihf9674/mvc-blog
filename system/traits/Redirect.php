<?php

namespace system\traits;

trait Redirect
{
      protected function redirect($url)
      {
            $protocol = stripos($_SERVER['SERVER_PROTOCOL'], 'https') == true ? 'https://' : 'http://';
            header("Location:" . $protocol . $_SERVER['HTTP_HOST'] . "/mvc/" . $url);
      }
      protected function redirect_back()
      {
            $phpReferer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : NULL;
            if (!is_null($phpReferer))
                  header("Location:" . $_SERVER['HTTP_REFERER']);
            else
                  echo "Error: Route not found!";
      }
}
