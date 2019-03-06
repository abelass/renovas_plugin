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
	

function get_id_source($id_rubrique, $ids_source) {
	if (!$id_source = sql_getfetsel(
		'id_rubrique', 
		'spip_rubriques',
		'id_rubrique=' . $id_rubrique . ' AND id_rubrique IN (' .implode(',',$ids_source) . ')')) {
		$id_parent = sql_getfetsel('id_parent', 'spip_rubriques', 'id_rubrique=' . $id_rubrique);
		$id_source = get_id_source($id_parent, $ids_source);
	}
	return $id_source;
}