<?php
namespace PiotrJaworski\InternalLinking\Helper;

/**
 * LinkBuilder class
 *
 * @author Piotr Jaworski
 */
class LinkBuilder implements \PiotrJaworski\InternalLinking\Helper\LinkBuilderInterface
{
    /**
     * Build a link HTML
     * 
     * @param array $link
     * @return string
     */
    public function toHtml(array $link)
    { 
        if(!$link['url']){
            return $link['keyword'];
        }
        
        $css = $link['css_class'] ? "class='".$link['css_class']."'" : "";
        $style  = $link['style'] ? "style='".$link['style']."'" : "";     
        
        return "<a href='".$link['url']."' ".$css." ".$style." "
                . "target='". \PiotrJaworski\InternalLinking\Model\Link::getTargetValueById($link['target'])."' "
                . "title='".$link['keyword']."'>".$link['keyword']."</a>";
        
        
       
    }
}
