<?php


if( !function_exists( 'getData' ) ) {
    
    function getData( $data ){
        return date('d/m/Y', strtotime($data));
    }
}

if( !function_exists( 'getStatusChamada' ) ) {
    
    function getStatusChamada( $id ){
        switch($id){
            case 0: return "<span class='label label-danger'>Não finalizada</span>"; break;
            case 1: return "<span class='label label-success'>Concluida</span>"; break;
            default: return "<span class='label label-danger'>Não finalizada</span>"; break;
        }
    }
}


if( !function_exists( 'getStudant' ) ) {
    
    function studantIsChecked( $presencas, $aluno_id ){
        if(isset($presencas) && count($presencas) > 0 ){
            foreach($presencas as $presenca){
                if( $aluno_id == $presenca->aluno_id && $presenca->presenca == 1 )
                    return "checked";
            }
        }
    }
}

if( !function_exists( 'getTotalFrequencia' ) ) {

    function getTotalFrequencia( $aluno_id ){
        $resultado = \DB::table('chamada_alunos')
            ->select('presenca')
            ->where('aluno_id', '=', $aluno_id)
            ->distinct()
            ->first();
        if(isset($resultado->presenca))
            if($resultado->presenca == 1)
            return "<span class='label label-success'>Presente</span>";

        return "<span class='label label-danger'>Ausente</span>";
    }
}

if( !function_exists( 'getTotalFaltas' ) ) {
    
    function getTotalFaltas( $aluno_id ){
        $resultado = \DB::table('lista_faltas')
                     ->select('total_faltas')
                     ->where('aluno_id', '=', $aluno_id)
                     ->distinct()
                     ->first();
        if(isset($resultado->total_faltas))
            return $resultado->total_faltas;
        
        return 0;
    }
}


if( !function_exists( 'getIdade' ) ) {
    
    function getIdade( $data_nasc ){
        $data_nasc=explode("/", $data_nasc);
        $data=date("d/m/Y");
        $data=explode("/",$data);
        
        $dt_nascimento = $data_nasc[0].'-'.$data_nasc[1].'-'.$data_nasc[2];
        $dt_hoje = $data[2].'-'.$data[1].'-'.$data[0];

        $diff = abs(strtotime($dt_hoje) - strtotime($dt_nascimento));

        $years = floor($diff / (365*60*60*24));
        $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
        $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

        if((int)$years > 0){
            return "$years ano(s), $months mes(es), $days dia(s)"; //, $years, $months, $days);
        } else if((int)$years == 0 && (int)$months > 0){
            return "$months mes(es), $days dia(s)";
        } else if((int)$years == 0 && (int)$months == 0 && (int)$days > 0){
            return "$days dia(s)";
        }

    }
}




