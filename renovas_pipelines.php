<?php
/**
 * Utilisations de pipelines par Renovas
 *
 * @plugin     Renovas
 * @copyright  2013 - 2019
 * @author     Rainer Müller
 * @licence    GNU/GPL
 * @package    SPIP\Renovas\Pipelines
 */

if (!defined('_ECRIRE_INC_VERSION')) return;
	
function renovas_pre_edition($flux){

	// recuperer les champs crees par les plugins
	if ($extras = champs_extras_objet($flux['args']['table'])) {

		// recherchons un eventuel prefixe utilise pour poster les champs
		$type = objet_type(table_objet($flux['args']['table']));
		$prefixe = _request('prefixe_champs_extras_' . $type);
		if (!$prefixe) {
			$prefixe = '';
		}
		foreach ($extras as $c) {
			if ($c['options']['nom'] == "date_debut" ) {
				//On met la date saisie au format MySql AAAA-MM-JJ
				if ($date = recup_date($flux['data']['date_debut'])) {
					$flux['data']['date_debut'] = date("Y-m-d",mktime($date[3],$date[4],0,$date[1],$date[2],$date[0]));
				} 
				else {
					$flux['data']['date_debut'] = date("Y-m-d");
				}
			}
			if ($c['options']['nom'] == "date_fin" ) {
				//On met la date saisie au format MySql AAAA-MM-JJ
				if ($date = recup_date($flux['data']['date_fin'])) {
					$flux['data']['date_fin'] = date("Y-m-d",mktime($date[3],$date[4],0,$date[1],$date[2],$date[0]));
				} 
				else {
					$flux['data']['date_fin'] = date("Y-m-d");
				}
			}
		}
	}
	return $flux;
}
