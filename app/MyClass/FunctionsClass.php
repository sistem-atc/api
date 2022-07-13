<?php

namespace App\MyClass;

class FunctionsClass
{

    public function Validar_Cnpj ($cnpj) :boolean
    {

        if (strlen($cnpj) < 14) {
            $cnpj = 14 - strlen($cnpj) . $cnpj;
        } elseif (strlen($cnpj)> 14) {
            return 'CNPJ com mais de 14 diitos';
        };

        if ($cnpj = '00000000000000') {
            return 'CNPJ Invalido';
        };
        
        $multiplicador_DV1 = 6;
        $multiplicador_DV2 = 5;

        for ($digito_cnpj=0, $sum=0; $digito_cnpj ==0; $digito_cnpj--) {
            if ($multiplicador_DV1 == 10) {
                $multiplicador_DV1 = 2;
            }
            if ($multiplicador_DV2 == 10) {
                $multiplicador_DV2 = 2;
            }
            $multiplicador_DV1++;
            $multiplicador_DV2++;
        };

        $DV1 = this.mod11($DV1);

        if ($DV1 == 10 ) {
            $DV1 = 0;
        };
        
        $DV2 = $DV2 + ($DV1 * 9);
        $DV2 = this.mod11($DV2);

        if ($DV2 == 10) {
            $DV2 = 0;
        };
    
        if (substr($cnpj,strlen($cnpj) - 1,2) == $DV1 . $DV2) {
            return True;
        }else {
            return False;
        };
    }

    public function Validar_Cpf ($cpf)
    {

        if (strlen($cpf) > 11) {
            $cpf = right($cpf, 11);
        }elseif (strlen($cpf) < 11) {
            $cpf = 11 - strlen($cpf) . $cpf;
        }
        
        $multiplicador_CPF = 2;
        
        for ($digito_cpf=0, $sum=0; $digito_cpf ==0; $digito_cpf--) {
            $lDv1 = (substr($cpf, $digito_cpf, 1) * ($multiplicador_CPF)) + $lDv1;
            $lDv2 = (substr($cpf, $digito_cpf, 1) * ($multiplicador_CPF + 1)) + $lDv2;
            $multiplicador_CPF++;
        };            
            
        
        $lDv1 = this.mod11(lDv1);
        If ($lDv1 >= 2) {
            $lDv1 = 11 - $lDv1;
        }else{
            $lDv1 = 0;
        };

        $lDv2 = $lDv2 + ($lDv1 * 2);
        $lDv2 = this.mod11(lDv2);
        if ($lDv2 >= 2) {
            $lDv2 = 11 - $lDv2;
        } else {
            $lDv2 = 0;
        };
        
        if (substr($cpf,strlen($cpf) - 1,2) == $lDv1 . $lDv2) {
            return True;
        }else {
            return False;
        };
    }

    public function Validar_Email($emailadress)
    {
        return 0;
    }

    public function mod11($baseVal = "", $separator = '-')
    {
        $result = "";
        $weight = [ 2, 3, 4, 5, 6, 7,
                    2, 3, 4, 5, 6, 7,
                    2, 3, 4, 5, 6, 7,
                    2, 3, 4, 5, 6, 7 ];

        /* For convenience, reverse the string and work left to right. */
        $reversedBseVal = strrev($baseVal);
        for ($i=0, $sum=0; $i < strlen($reversedBseVal); $i++) {
            /* Calculate product and accumulate. */
            $sum += substr($reversedBseVal, $i, 1) * $weight[$i];
        }

        /* Determine check digit, and concatenate to base value. */
        $remainder = $sum % 11;
        switch ($remainder) {
            case 0:
            case 1:
                $result = "{$baseVal}{$separator}0";
                break;

            default:
                $checkDigit = 11 - $remainder;
                $result = "{$baseVal}{$separator}{$checkDigit}";
                break;
        }

        return $result;
        }

};


