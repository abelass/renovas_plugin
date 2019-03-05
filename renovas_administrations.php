<?php
/**
 * Fichier gérant l'installation et désinstallation du plugin Renovas
 *
 * @plugin     Renovas
 * @copyright  2013
 * @author     Rainer Müller
 * @licence    GNU/GPL
 * @package    SPIP\Renovas\Installation
 */

if (!defined('_ECRIRE_INC_VERSION')) return;


/**
 * Fonction d'installation et de mise à jour du plugin Renovas.
 *
 * Vous pouvez :
 *
 * - créer la structure SQL,
 * - insérer du pre-contenu,
 * - installer des valeurs de configuration,
 * - mettre à jour la structure SQL 
 *
 * @param string $nom_meta_base_version
 *     Nom de la meta informant de la version du schéma de données du plugin installé dans SPIP
 * @param string $version_cible
 *     Version du schéma de données dans ce plugin (déclaré dans paquet.xml)
 * @return void
**/
function renovas_upgrade($nom_meta_base_version, $version_cible) {
	include_spip('inc/cextras');
	include_spip('base/renovas');
		
	$maj = array();
	
	//Installer les champs extras  
	if (function_exists('cextras_api_upgrade')) {
		cextras_api_upgrade(renovas_declarer_champs_extras(), $maj['create']);
	}
	
	include_spip('base/upgrade');
	maj_plugin($nom_meta_base_version, $version_cible, $maj);
}


/**
 * Fonction de désinstallation du plugin Renovas.
 * 
 * Vous devez :
 *
 * - nettoyer toutes les données ajoutées par le plugin et son utilisation
 * - supprimer les tables et les champs créés par le plugin. 
 *
 * @param string $nom_meta_base_version
 *     Nom de la meta informant de la version du schéma de données du plugin installé dans SPIP
 * @return void
**/
function renovas_vider_tables($nom_meta_base_version) {
	cextras_api_vider_tables(renovas_declarer_champs_extras());

	effacer_meta($nom_meta_base_version);
}
