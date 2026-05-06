<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class EditorasChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($data)
    {
        return $this->chart->barChart()
            ->setTitle('Editoras por Cidade')
            ->setSubtitle('Distribuição cadastrada no sistema')
            ->addData($data['quantidades'], 'Quantidade')
            ->setXAxis($data['cidades'])
            ->setColors(['#0d6efd', '#198754', '#ffc107', '#dc3545'])
            ->setGrid(true)
            ->setDataLabels(true);
    }
}