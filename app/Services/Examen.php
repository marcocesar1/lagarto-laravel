<?php

namespace App\Services;

class Examen
{
    // enter : 6 3 1 10 
    // output: success on day 3

    /*
        H = 0 indica el fin de la entrada; de otra manera, todos los números estarán entre 0 y 100, inclusivo.H es la altura del pozo en metros
        U es la distancia en metros que el lagarto puede escalar en un día,
        D es la distancia en metros que el lagarto resbala durante la noche
        F es el factor de fatiga expresado como porcentaje.     
     */

    public function execute(
        int $alturaPozo,
        int $distanciaPorDia,
        int $distanciaResbalaPorNoche,
        int $porcentajeFatiga,
    )
    {
        //calcular los datos del primer día
        $altura_despues_resbalar = $distanciaPorDia - $distanciaResbalaPorNoche;
        $altura_temp = $altura_despues_resbalar;
        
        //almacenar el historial del primer día
        $dias = [];
        $primerDia = [
            'dia' => 1,
            'altura_inicial' => 0,
            'distancia_escalada' => $distanciaPorDia,
            'altura_despues_escalar' => $distanciaPorDia,
            'altura_despues_resbalar' => $altura_despues_resbalar,
        ];

        $dias[] = $primerDia;

        // caso base
        if($alturaPozo == 0) {
            return [
                'hora' => "success on day 1",
                'history' => $dias,
            ];
        }

        // si la distancia por dia es mayor que la altura del pozo
        if($distanciaPorDia > $alturaPozo) {
            return [
                'hora' => "success on day 1",
                'history' => $dias,
            ];
        }        

        // si la altura despues resbalar por dia es mayor que la altura del pozo
        if($altura_despues_resbalar > $alturaPozo) {
            return [
                'hora' => "success on day 1",
                'history' => $dias,
            ];
        }

        //obtener la cantidad de la fatiga que se ira restando por cada día
        $fatiga = ($distanciaPorDia * $porcentajeFatiga) / 100;
        $hora = '';
        
        // se saca los calculos de los dias posteriores gurdando el historial en un array
        $index = 0;
        $dia = 1;
        while($altura_temp <= $alturaPozo) {
            //se obtienen algunos datos del dia anterior para poder calcular los nuevos
            $prevAlturaDespuesResbalar = $dias[$index]['altura_despues_resbalar'];
            $prevDistanciaEscalada = $dias[$index]['distancia_escalada'];

            //se hacen las operaciones para el dia actual tomando algunos valores del día anterior
            $dia+=1;
            $alturaInicial = $prevAlturaDespuesResbalar;
            $distanciaEscalada = $prevDistanciaEscalada - $fatiga;
            $alturaDespuesEscalar = $alturaInicial + $distanciaEscalada;
            $alturaDespuesResbalar = $alturaDespuesEscalar - $distanciaResbalaPorNoche;

            // se agrega un nuevo elemento con los datos del día
            $dias[] = [
                'dia' => $dia,
                'altura_inicial' => $alturaInicial,
                'distancia_escalada' => $distanciaEscalada,
                'altura_despues_escalar' => $alturaDespuesEscalar,
                'altura_despues_resbalar' => $alturaDespuesResbalar,
            ];

            //verififcar si después de escalar o resbalar sale del pozo
            if($alturaDespuesEscalar > $alturaPozo || $alturaDespuesResbalar > $alturaPozo) {
                $hora = "success on day {$dia}";
                break;
            }
            
            //verififcar si después de escalar o resbalar los calculos son menores que 0 significa que falló
            if($alturaDespuesEscalar < 0 || $alturaDespuesResbalar < 0) {
                $hora = "failure on day {$dia}";
                break;
            }
            
            //guardar la altura en un temporal para validar la siguiente iteración
            $altura_temp = $alturaDespuesResbalar;
            $index++;
        }

        return [
            'hora' => $hora,
            'history' => $dias,
        ];
    }
}