<?php

class M
{
    private function mama() {}
    static function kaka(){
        (new M())->mama()
    }
}

(new M(