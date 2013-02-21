<?php
if (!defined("_ECRIRE_INC_VERSION")) return;

function renovas_declarer_champs_extras($champs = array()) {
  $champs['spip_rubriques']=array(
      'date_debut' => array(
          'saisie' => 'date',//Type du champ (voir plugin Saisies)
          'options' => array(
                'nom' => 'date_debut', 
                'label' => _T('date_debut'), 
                'sql' => "date NOT NULL DEFAULT '0000-00-00'",
                'defaut' => '',// Valeur par dÃ©faut
                'restrictions'=>array('voir' => array('auteur' => ''),//Tout le monde peut voir
                'modifier' => array('auteur' => 'administrateur')),//Seuls les webmestres peuvent modifier
          ),
      ),
      'date_fin' => array(
          'saisie' => 'date',//Type du champ (voir plugin Saisies)
          'options' => array(
                'nom' => 'date_fin', 
                'label' => _T('date_fin'), 
                'sql' => "date NOT NULL DEFAULT '0000-00-00'",
                'defaut' => '',// Valeur par dÃ©faut
                'restrictions'=>array('voir' => array('auteur' => ''),//Tout le monde peut voir
                'modifier' => array('auteur' => 'administrateur')),//Seuls les webmestres peuvent modifier
          ),
      )      
  );

  return $champs;   
}
?>