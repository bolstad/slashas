<?php 

namespace Slashas\Slashas;

interface DataFetcherInterface
{

    public function getVariable( $name );
    public function setDefaults( $name );

}


