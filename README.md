
# Loterias do SENAC

Olá, bem vindo(a) a API de loterias do SENAC. Nesta API você encontrará dados fictícios sobre loterias.

Para acessar os dados você deve utilizar o endpoint `/sorteio/[tipo]`. Como `[tipo]` você pode utilizar:

- megasena
- quina
- lotofacil
- timemania
- diadasorte

Cada um dos sorteios retornará:
```http
  GET /sorteio/[tipo]
```

| Parâmetro   | Tipo       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `tema` | `string` | Um texto contendo o nome do sorteio realizado |
| `numero` | `number`| Um número contendo o código do sorteio realizado |
| `data` | `date` | Uma data contendo o dia, mês e ano do último sorteio |
| `numerosSorteados` | `array[numbers]` | Uma lista de números sorteados, a quantidade varia de acordo com o sorteio realizado |


