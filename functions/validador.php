<?php

function formataCampo($campo = null){
    // Formata o campo em primeira Maiúscula
    $ignore = 'de do das da dos';
    $campo = ucwords(mb_strtolower($campo));
    return str_replace(explode(' ', ucwords($ignore)), explode(' ', $ignore), $campo);
}

function validaCampo($campo = null) {
    // Verifica se o campos esta vazio
        if(empty($campo)) {
            return false;
        }else{
            return true;
        }
    }

function mascara($val, $mask)
{
    /* Função "Máscara de qualquer coisa"
    http://blog.clares.com.br/php-mascara-cnpj-cpf-data-e-qualquer-outra-coisa/ */

    /* exemplo de uso: 

    $cnpj = "11222333000199";
    $cpf = "00100200300";
    $cep = "08665110";
    $data = "10102010";

    echo mask($cnpj,'##.###.###/####-##');
    echo mask($cpf,'###.###.###-##');
    echo mask($cep,'#####-###');
    echo mask($data,'##/##/####');

    */

    $maskared = '';
    $k = 0;
    for ($i = 0; $i <= strlen($mask) - 1; $i++) {
        if ($mask[$i] == '#') {
            if (isset($val[$k]))
                $maskared .= $val[$k++];
        } else {
            if (isset($mask[$i]))
                $maskared .= $mask[$i];
        }
    }
    return $maskared;
}



function dinheiro($dado) {
    // usar a função number_format() para devolver o valor
    // $valor_servico = ' R$ ' . number_format($l['valor_servico'], 2, ',', '.');

    if ($dado != ""){
        $source = array('.', ',');
        $replace = array('', '.');
        $valor = str_replace($source, $replace, $dado); //remove os pontos e substitui a virgula pelo ponto
        return $valor; //retorna o valor formatado para gravar no banco
    }
    else{
        return 0.0;
    }
}

function validaCPF($cpf = null) {

    // Verifica se um número foi informado
        if(empty($cpf)) {
            return false;
        }
    
        // Elimina possivel mascara
        $cpf = preg_replace("/[^0-9]/", "", $cpf);
        $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);
    
        // Verifica se o numero de digitos informados é igual a 11 
        if (strlen($cpf) != 11) {
            return false;
        }
        // Verifica se nenhuma das sequências invalidas abaixo 
        // foi digitada. Caso afirmativo, retorna falso
        else if ($cpf == '00000000000' || 
            $cpf == '11111111111' || 
            $cpf == '22222222222' || 
            $cpf == '33333333333' || 
            $cpf == '44444444444' || 
            $cpf == '55555555555' || 
            $cpf == '66666666666' || 
            $cpf == '77777777777' || 
            $cpf == '88888888888' || 
            $cpf == '99999999999') {
            return false;
        // Calcula os digitos verificadores para verificar se o
        // CPF é válido
        } 
        else {   
            
            for ($t = 9; $t < 11; $t++) {
                
                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $cpf[$c] * (($t + 1) - $c);
                }
                $d = ((10 * $d) % 11) % 10;
                if ($cpf[$c] != $d) {
                    return false;
                }
            }
    
            return true;
        }
}


function validaCNPJ($cnpj){
     //var_dump(validar_cnpj('11.444.777/0001-61'));
    $cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj);
    // Valida tamanho
    if (strlen($cnpj) != 14)
        return false;
    // Valida primeiro dígito verificador
    for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++)
    {
        $soma += $cnpj[$i] * $j;
        $j = ($j == 2) ? 9 : $j - 1;
    }
    $resto = $soma % 11;
    if ($cnpj[12] != ($resto < 2 ? 0 : 11 - $resto))
        return false;
    // Valida segundo dígito verificador
    for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++)
    {
        $soma += $cnpj[$i] * $j;
        $j = ($j == 2) ? 9 : $j - 1;
    }
    $resto = $soma % 11;
    return $cnpj[13] == ($resto < 2 ? 0 : 11 - $resto);
}

?>