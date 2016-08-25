<?php

class GraphTest extends \PHPUnit\Framework\TestCase
{
    public function testGraph()
    {
        $g = new Graph();
        $g->addVertex(1, "A");
        $this->assertEquals([1 => 'A'], $g->getVertices());


        $hack = function () {
            $this->vertices[1] = 'B';
        };
        Closure::bind($hack, $g, 'Graph')();

        $this->assertEquals([1 => 'B'], $g->getVertices());
    }
}
