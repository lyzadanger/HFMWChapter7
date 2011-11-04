<?php

require_once(dirname(__FILE__) . '/event_list.inc');
require_once(dirname(__FILE__) . '/event_search.inc');

$search = new TartanatorEventSearch($events);
if ($search->isSearch()): ?>
  <li data-role="list-divider"><h3>Matching Events</h3></li>
<?php endif; ?>
<?php if ($search->hasMatchingEvents()): ?>
  <? foreach($search->getMatchingEvents() as $event): ?>
  <li><h3><?php print $event['title']; ?></h3>
  <p><?php print $event['address']; ?><br />
  <strong><?php print $event['city'] ?>, <?php print $event['state']; ?></strong> <?php print $event['postal_code']; ?><br />
  <?php print $event['distance_formatted']; ?></p>
  <p class="ui-li-aside"><strong><?php print $event['date']; ?></strong></p>
  </li>
  <?php endforeach; ?>
<?php endif; ?>
<?php if ($search->isSearch() && !$search->hasMatchingEvents()): ?>
  <li><strong>Sorry, no matching events found!</strong></li>
<?php endif; ?>