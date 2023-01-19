<?php
if (isset($_POST)) 
{
    foreach ($_POST as $key => $value) 
    {
        if (strpos($key, 'remove') === 0) 
        {
            $id = str_replace('remove', '', $key);
            foreach ($_SESSION['cart'] as $key => $shoe) 
            {
                if ($shoe['id'] == $id) {
                    unset($_SESSION['cart'][$key]);
                }
            }
        }
    }
}
