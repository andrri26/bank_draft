<?php


namespace App\Twig;

use App\Entity\Cheque;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class AppExtension extends AbstractExtension
{
    public function getFilters()
    {
        return [
            new TwigFilter('chart',[$this,'chartFilter']),
            new TwigFilter('bank',[$this,'getBank'])
        ];
    }

    public function chartFilter(array $items, $value_type = 'key'){
        $output = [];

        if($value_type === 'data'){
            foreach ($items as $k => $v){
                $output[] = $v;
            }
        }else{
            foreach ($items as $k => $v){
                $output[] = $k;
            }
        }
        return json_encode($output);
    }

    public function getBank($bank)
    {
        foreach (Cheque::BANK as $k => $v){
            if(strval($k) == $bank) return $v;
        }
        return 'N/A';
    }
}