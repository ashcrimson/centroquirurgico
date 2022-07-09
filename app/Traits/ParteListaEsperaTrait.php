<?php

namespace App\Traits;

use App\Models\Parte;

trait ParteListaEsperaTrait
{

    public function validarPreopColor(Parte $parte)
    {

        $attr = null;

        if ($parte->control_preop_eu && $parte->control_preop_anestesista && $parte->control_preop_medico &&
            $parte->control_banco_sangre) {
            if ($parte->pase_preop_eu && $parte->pase_preop_anestesista && $parte->pase_preop_medico &&
                $parte->pase_banco_sagre) {
                $attr = '#99E066';
            }
        }

        if ($parte->control_preop_eu && $parte->control_preop_anestesista && !$parte->control_preop_medico &&
            !$parte->control_banco_sangre) {
            if ($parte->pase_preop_eu && $parte->pase_preop_anestesista && !$parte->pase_preop_medico &&
                !$parte->pase_banco_sagre) {
                $attr = '#99E066';
            }
        } else if ($parte->control_preop_eu && $parte->control_preop_medico && !$parte->control_preop_anestesista &&
                   !$parte->control_banco_sangre) {
            if ($parte->pase_preop_eu && $parte->pase_preop_medico && !$parte->pase_preop_anestesista &&
                !$parte->pase_banco_sagre) {
                $attr = '#99E066';
            }
        } else if ($parte->control_preop_eu && $parte->control_banco_sangre && !$parte->control_preop_anestesista  &&
                   !$parte->control_preop_medico) {
            if ($parte->pase_preop_eu && $parte->pase_banco_sagre && !$parte->pase_preop_anestesista &&
                !$parte->pase_preop_medico) {
                $attr = '#99E066';
            }
        } else if ($parte->control_preop_eu && !$parte->control_preop_anestesista  && !$parte->control_preop_medico &&
                   !$parte->control_banco_sangre) {
            if ($parte->pase_preop_eu && !$parte->pase_preop_anestesista && !$parte->pase_preop_medico &&
                !$parte->pase_banco_sagre) {
                $attr = '#99E066';
            }
        }

//        if ($parte->control_preop_anestesista && $parte->control_preop_eu && $parte->control_preop_medico &&
//                                                  $parte->control_banco_sangre) {
//            if ($parte->pase_preop_anestesista && $parte->pase_preop_eu && $parte->pase_preop_medico &&
//                                                   $parte->pase_banco_sagre) {
//                $attr = '#99E066';
//            }
//        }
//
//        if ($parte->control_preop_anestesista && ($parte->control_preop_eu)) {
//            if ($parte->pase_preop_anestesista && ($parte->pase_preop_eu)) {
//                $attr = '#99E066';
//            }
//        }
//
//        if ($parte->control_preop_anestesista && $parte->control_preop_medico) {
//            if ($parte->pase_preop_anestesista && $parte->pase_preop_medico) {
//                $attr = '#99E066';
//            }
//        }
//
//        if ($parte->control_preop_anestesista && ($parte->control_banco_sangre)) {
//            if ($parte->pase_preop_anestesista && ($parte->pase_banco_sagre)) {
//                $attr = '#99E066';
//            }
//        }
//
//        if ($parte->control_preop_medico && $parte->control_preop_anestesista) {
//            if ($parte->pase_preop_medico && $parte->pase_preop_anestesista) {
//                $attr = '#99E066';
//            }
//        }
//
//        if ($parte->control_preop_medico && $parte->control_preop_eu) {
//            if ($parte->pase_preop_medico && $parte->pase_preop_eu) {
//                $attr = '#99E066';
//            }
//        }
//
//        if ($parte->control_preop_medico && $parte->control_banco_sangre) {
//            if ($parte->pase_preop_medico && $parte->pase_banco_sagre) {
//                $attr = '#99E066';
//            }
//        }
//
//        if ($parte->control_banco_sangre && $parte->control_preop_medico  && $parte->control_preop_anestesista &&
//                                             $parte->control_preop_eu) {
//            if ($parte->pase_banco_sagre && $parte->pase_preop_medico && $parte->pase_preop_anestesista &&
//                                             $parte->pase_preop_eu){
//                $attr = '#99E066';
//            }
//        }
//
//        if ($parte->control_banco_sangre && $parte->control_preop_medico) {
//            if ($parte->pase_banco_sagre && $parte->pase_preop_medico){
//                $attr = '#99E066';
//            }
//        }
//
//        if ($parte->control_banco_sangre && ($parte->control_preop_anestesista)) {
//            if ($parte->pase_banco_sagre && ($parte->pase_preop_anestesista)){
//                $attr = '#99E066';
//            }
//        }
//
//        if ($parte->control_banco_sangre && ($parte->control_preop_eu)) {
//            if ($parte->pase_banco_sagre && ($parte->pase_preop_eu)){
//                $attr = '#99E066';
//            }
//        }

//        if ($parte->control_preop_medico) {
//            if ($parte->pase_preop_medico) {
//                $attr = '#99E066';
//            }
//        }

//        if ($parte->control_preop_anestesista) {
//            if ($parte->pase_preop_anestesista) {
//                $attr = '#99E066';
//            }
//        }

        return $attr;

    }

}
