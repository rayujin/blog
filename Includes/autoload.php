<?php
function autoload($classname)
{
  if (file_exists($file = 'C:\wamp64\www\blog1\Controllers\\' . $classname . '.php'))
  {
    require $file;
  }
  elseif (file_exists($file = 'C:\wamp64\www\blog1\Models\\' . $classname . '.php')) 
  {
  	require $file;
  }
  elseif (file_exists($file = 'C:\wamp64\www\blog1\Entities\\' . $classname . '.php')) 
  {
  	require $file;
  }
   elseif (file_exists($file = 'C:\wamp64\www\blog1\Includes\\' . $classname . '.php')) 
  {
  	require $file;
  }
  else
  {
  	echo "Classe introuvale, impossible de l'inclure ";
  }


  
}

spl_autoload_register('autoload');
?>