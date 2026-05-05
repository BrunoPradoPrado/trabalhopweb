<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class AutoresChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($dados)
    {
        return $this->chart->barChart()
            ->setTitle('Autores por Nacionalidade')
            ->setSubtitle('Distribuição cadastrada no sistema')

            ->addData($dados['quantidades'], 'Autores')

            ->setXAxis($dados['nacionalidades'])

            ->setColors(['#0d6efd', '#198754', '#ffc107', '#dc3545'])

            ->setGrid(true)

            ->setDataLabels(true);
    }
}