<?php

/**
 * @file
 * Sample hooks demonstrating usage in Webform Plus.
 */

/**
 * @defgroup webform_plus_hooks Webform Plus Module Hooks
 * @{
 *  Webform Plus' hooks enable other modules to intercept events within
 * the module.
 */

/**
 * Alter the webform data prior to importing.
 *
 * @param array $webform
 *   The webform data structure.
 * @param array $context
 *   An array giving the context.
 *   Keys:
 *     - 'operation' - The operation being performed:
 *       - 'insert' - inserting a new node.
 *       - 'update' - adding a webform to an existing node.
 *     - 'node' - A reference to the node.
 *     - 'options' - Options selected by the user during the import.
 *       - 'components_only' - boolean indicating whether to erase (FALSE)
 *                             or keep (TRUE) existing webform settings.
 *       - 'keep_existing_components' - boolean indicating if existing
 *                                      components should be preserved.
 */
function hook_webform_plus_import_alter(&$webform, $context) {
  $webform['my_setting'] = [
    'setting1' => 'value1',
    'nid' => $context['node']->nid,
  ];

  $context['node']->my_node_settings = [];
}

/**
 * Alter the node data prior to exporting webform data.
 *
 * @param array $node
 *   The node to be exported. Any changes to the webform element will be
 *   reflected in the generated export file.
 */
function hook_webform_plus_export_alter($node) {
  $node->webform['my_setting'] = [];
}

/**
 * @} webform_plus_hooks
 */
