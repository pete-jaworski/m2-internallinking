<?php
namespace PiotrJaworski\InternalLinking\Helper;

/**
 * LinkBuiderInterface interface
 *
 * @author Piotr Jaworski
 */
interface LinkBuilderInterface
{
    /**
     * Build a link HTML
     * 
     * @param array $link
     * @return string
     */
    public function toHtml(array $link);
    
}
