<?php
declare(strict_types=1);

/**
 * @author Artuikh Vladimir
 * @copyright 2021 Artuikh Vladimir, vladimir.artjukh@gmail.com
 */

namespace App\ServiceContainers\StatTicket;


interface StatTicketIntarface
{
    /**
     * @return array
     */
    public function list();
}