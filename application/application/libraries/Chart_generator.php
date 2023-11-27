<?php
error_reporting(0);
class Chart_generator
{
    // start of class
    
    
    public function generate_pie_chart( $width = 400, $height = 200, $data = [], $file_name = '', $title = '')
    {
        //  function generate_pie_chart : Start
        if(count($data) > 0)
        {
            include_once(APPPATH.'third_party/phpgraphlib_v2.31/phpgraphlib.php');
            include_once(APPPATH.'third_party/phpgraphlib_v2.31/phpgraphlib_pie.php');
            $graph = new PHPGraphLibPie($width, $height, $file_name);
            // $file_name = ROOTBASEPATH.'media/testasda.png'
            // $data = array("CBS" => 6.3, "NBC" => 4.5,"FOX" => 2.8, "ABC" => 2.7, "CW" => 1.4);
            $graph->addData($data);

            $graph->setPrecision(2);

             // $title = 'Health Score Stack'   
            $graph->setTitle($title);
            $graph->setLabelTextColor('50,50,50');
            $graph->setLegendTextColor('50,50,50');
            $graph->createGraph();
        }
        //  function generate_pie_chart : End
    }
    
    
    // end of class
}