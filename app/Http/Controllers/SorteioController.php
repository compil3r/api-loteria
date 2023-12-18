<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SorteioController extends Controller
{
    private $loteriasValidas = ['megasena', 'quina', 'lotofacil', 'lotomania', 'timemania', 'diadasorte'];

    public function obterDadosSorteio($concurso)
    {
        // Verifica se o concurso é válido
        if (!in_array($concurso, $this->loteriasValidas)) {
            return response()->json(['erro' => 'Concurso inválido'], 400);
        }

        // Aqui você pode implementar a lógica real para obter os dados do sorteio
        // Para este exemplo, apenas retornaremos dados fictícios
        $dadosSorteio = [
            'tema' => "Sorteio $concurso",
            'numero' => rand(1000, 9999),
            'data' => date('Y-m-d'),
            'numerosSorteados' => $this->gerarNumerosSorteados($concurso)
        ];

        return response()->json($dadosSorteio);
    }

    private function gerarNumerosSorteados($concurso)
    {
        $quantidadeNumeros = $this->obterQuantidadeNumeros($concurso);

        $numerosSorteados = [];
        for ($i = 0; $i < $quantidadeNumeros; $i++) {
            $numerosSorteados[] = rand(1, $this->obterLimiteNumeros($concurso));
        }
        return $numerosSorteados;
    }

    private function obterQuantidadeNumeros($concurso)
    {
        $quantidades = [
            'megasena' => 6,
            'quina' => 5,
            'lotofacil' => 15,
            'lotomania' => 20,
            'timemania' => 7,
            'diadasorte' => 7
        ];

        return $quantidades[$concurso];
    }

    private function obterLimiteNumeros($concurso)
    {
        $limites = [
            'megasena' => 60,
            'quina' => 80,
            'lotofacil' => 25,
            'lotomania' => 100,
            'timemania' => 80,
            'diadasorte' => 31
        ];

        return $limites[$concurso];
    }
}
