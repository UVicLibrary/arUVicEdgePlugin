<?php

/*
 * This file is part of the Access to Memory (AtoM) software.
 *
 * Access to Memory (AtoM) is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Access to Memory (AtoM) is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Access to Memory (AtoM).  If not, see <http://www.gnu.org/licenses/>.
 */

class DefaultNewestAdditionsComponent extends sfComponent
{
  private function getNewestAdditions()
  {
    $sql = '
      SELECT o.id FROM object o LEFT JOIN status s ON o.id = s.object_id
      LEFT JOIN information_object io ON o.id = io.id
      WHERE o.class_name = "QubitInformationObject"
      AND o.id != ?
      AND s.status_id != ?
      AND io.parent_id = ?
      ORDER BY created_at DESC LIMIT 10
    ';

    $rows = QubitPdo::fetchAll($sql, array(QubitInformationObject::ROOT_ID, QubitTerm::PUBLICATION_STATUS_DRAFT_ID, QubitInformationObject::ROOT_ID));

    return array_map(function($x) { return $x->id; }, $rows);
  }
  public function execute($request)
  {
    $this->newestAdditions = $this->getNewestAdditions();

    if (0 == count($this->newestAdditions))
    {
      return sfView::NONE;
    }
  }
}
