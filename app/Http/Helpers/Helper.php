<?php
    //retorna a data de uma forma amigavel para enteder.
    function dateFriendly($dateTime){
        // retornar o tanto a quantidade de ano caso tenha ano
        // retornar o tanto de meses caso seja menor que 12 meses
        // retornar a quantidade de dias caso seja menor que 30 dias
        // retornar quantidade de horas caso seja menor que 24

        // $now = date("Y-m-d H:i:s");

        // $data1 = new DateTime($dateTime);
        // $data2 = new DateTime($now);

        // $intervalo = $data2->diff($data1);

        // $mensagem = "O intervalo e de ".$intervalo->y." anos, ".$intervalo->m." meses, e ".$intervalo->d." dia e ".$intervalo->h." Horas e ".$intervalo->i." minutos";

        // if($intervalo->y == 0){

        //     if($intervalo->d == 1){

        //         $mensagem = "Ontem às ".$data1->format('H:i');

        //         return $mensagem;

        //     }
        //     if($intervalo->h < 24){

        //         if(( $intervalo->h == 0 )&&( $intervalo->i < 60)){
        //             $mensagem = "Há ".$intervalo->i. " minuto(s)" ;
        //             return $mensagem;
        //         }elseif (( $intervalo->h > 0 )&&( $intervalo->d < 1)) {
        //             # code...
        //             $mensagem = "Há ".$intervalo->h. " horas" ;
        //             return $mensagem;
        //         }

        //     }

        //     $mensagem = $data1->format('d')." de ".$data1->format('M')." às ".$data1->format('H:i');

        // }

        $timestamp = strtotime($dateTime);
        $minute = 60;
        $hour = $minute * 60;
        $day = $hour * 24;
        $month = 30 * $day;
        $year = 12 * $month;

        $delta = floor(time() - $timestamp);
        if ($delta < 2 )           return 'Agorinha';
        if ($delta < 1 * $minute)  return "Há $delta segundos";
        if ($delta < 2 * $minute)  return 'Há um minuto';
        if ($delta < 45 * $minute) return 'Há '.round($delta / $minute).' minutos';
        if ($delta < 90 * $minute) return 'Há uma hora';
        if ($delta < 23 * $hour)   return 'Há '.round($delta / $hour).' horas';
        if ($delta < 48 * $hour)   return 'Ontem';
        if ($delta < 30 * $day)    return 'Há '.round($delta / $day).' dias';
        if ($delta < 45 * $day)    return 'Há um mês';
        if ($delta < 11 * $month)  return 'Há '.round($delta / $month).' meses';
        if ($delta < 18 * $month)  return 'Há um ano';

        return 'Há '.round($delta / $year).' anos';

        // return $mensagem;
    }

    // recebe um nome completo e retorna as iniciais
    function getFirtWordName($fullName){
        $partes = explode(' ', $fullName);
        $primeiroNome = array_shift($partes);
        $ultimoNome = array_pop($partes);

        $letraPrimeiroNome = str_split($primeiroNome);
        $letraSegundoNome = str_split($ultimoNome);

        $entregar = $letraPrimeiroNome[0].$letraSegundoNome[0];

        return $entregar;
    }

    //função recebe um id e retorna as iniciais do usuario referente
    function getFirstLetterNamesIdUser($id){
        $user = App\Models\User::find($id);

        $retorno =  getFirtWordName($user->name);

        return $retorno;
    }

    //função recebe um id e retorna o name do user
    function getUserName($id){
        $user = App\Models\User::find($id);

        $retorno =  $user->name;

        return $retorno;
    }

    //Função para monstar o link caso haja nos comentários
    function montarLink($texto){
        if (!is_string ($texto))
            return $texto;

        $er = "/((http|https|ftp|ftps):\/\/(www\.|.*?\/)?|www\.)([a-zA-Z0-9]+|_|-)+(\.(([0-9a-zA-Z]|-|_|\/|\?|=|&)+))+/i";
        preg_match_all ($er, $texto, $match);

        foreach ($match[0] as $link)
        {
            //coloca o 'http://' caso o link não o possua
            if(stristr($link, "http://") === false && stristr($link, "https://") === false)
            {
                $link_completo = "http://" . $link;
            }else{
                $link_completo = $link;
            }

            $link_len = strlen ($link);

            //troca "&" por "&", tornando o link válido pela W3C
        $web_link = str_replace ("&", "&amp;", $link_completo);
        $texto = str_ireplace ($link, "<a href=\"" . $web_link . "\" target=\"_blank\">". (($link_len > 60) ? substr ($web_link, 0, 25). "...". substr ($web_link, -15) : $web_link) ."</a>", $texto);

        }

        return $texto;
    }


