<?php
/**
 * Fonctions pour Renovas
 *
 * @plugin     Renovas
 * @copyright  2013 - 2019
 * @author     Rainer Müller
 * @licence    GNU/GPL
 * @package    SPIP\Renovas\Fonctions
 */

if (!defined('_ECRIRE_INC_VERSION')) return;
	
/**
 * Détermine l'id_rubrique du secteur dont dépend la rubrique en cours.
 * 
 * @param int $id_rubrique
 *   L'id_rubrique courante.
 * @param array les 
 *   identifiants des secteurs
 * 
 * @return 
 *   L'identifiant du secteur correpondnanbt
 */
function get_id_secteur($id_rubrique, $ids_secteur) {
	$id_secteur = $id_rubrique;
	
	if (!is_array($ids_secteur)) {
		$ids_secteur = explode(',', $ids_secteur);
	}

	if (!$id_secteur = sql_getfetsel(
		'id_rubrique', 
		'spip_rubriques',
		'id_rubrique=' . $id_rubrique . ' AND id_rubrique IN (' .implode(',',$ids_secteur) . ')')) {
		if ($id_parent = sql_getfetsel(
			'id_parent', 
			'spip_rubriques', 
			'id_rubrique=' . $id_rubrique)) {
			$id_secteur = get_id_source($id_parent, $ids_secteur);
		}
	}
	return $id_secteur;
}
