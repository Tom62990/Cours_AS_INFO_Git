<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainPage
{
    /**
     * @Route("/mainpage")
     */

    public function number()
    {
        $number = random_int(0, 100);

        return new Response(
            '<html><body>Test number: '.$number.'</body></html>'
        );
    }
}

?>