<div class="modal fade" id="clientHoursHistoryModal-<?= htmlspecialchars($accountId, ENT_QUOTES, 'UTF-8') ?>" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content clients-modal-content dash-card">
      <div class="modal-header clients-modal-header border-0 panel-header">
        <div class="d-flex align-items-start justify-content-between gap-3 w-100">
          <div class="modal-header-text">
            <h2 class="modal-title clients-modal-title mb-1">Hours History</h2>
            <p class="clients-modal-subtitle mb-0">View previously logged hours for this account.</p>
          </div>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
      </div>

      <div class="modal-body clients-modal-body">
        <div class="clients-hours-history-wrap rounded-4">
          <?php if (empty($hoursHistoryRecords)): ?>
            <div class="clients-hours-history-empty">
              No hours have been recorded for this account yet.
            </div>
          <?php else: ?>
            <div class="clients-hours-history-list" role="list" aria-label="Hours history records for <?= htmlspecialchars($account['name'], ENT_QUOTES, 'UTF-8') ?>">
              <?php foreach ($hoursHistoryRecords as $history): ?>
                <?php
                $billingType = (string) ($history['billingType'] ?? 'Payment');
                $badgeClass = 'clients-hours-badge-payment';

                if ($billingType === 'Credit') {
                  $badgeClass = 'clients-hours-badge-credit';
                } elseif ($billingType === 'Free Hours') {
                  $badgeClass = 'clients-hours-badge-free';
                }
                ?>
                <article class="clients-hours-history-item" role="listitem">
                  <div class="clients-hours-history-item-inner">
                    <div class="clients-hours-history-left">
                      <p class="clients-hours-history-date mb-1"><?= htmlspecialchars((string) ($history['date'] ?? ''), ENT_QUOTES, 'UTF-8') ?></p>
                      <p class="clients-hours-history-user mb-0"><?= htmlspecialchars((string) ($history['user'] ?? ''), ENT_QUOTES, 'UTF-8') ?></p>
                    </div>

                    <div class="clients-hours-history-right">
                      <span class="clients-hours-metric"><?= (int) ($history['hours'] ?? 0) ?>h <?= sprintf('%02d', (int) ($history['minutes'] ?? 0)) ?>m</span>
                      <span class="clients-hours-badge <?= $badgeClass ?>"><?= htmlspecialchars($billingType, ENT_QUOTES, 'UTF-8') ?></span>
                      <span class="clients-hours-meta">Rate: $<?= number_format((float) ($history['hourlyRate'] ?? 0), 2) ?>/hr</span>
                      <span class="clients-hours-meta">Revenue: $<?= number_format((float) ($history['grossRevenue'] ?? 0), 2) ?></span>
                    </div>
                  </div>

                  <div class="clients-hours-notes mt-3">
                    <span class="clients-hours-notes-label">Notes:</span>
                    <p class="clients-hours-notes-text mb-0"><?= htmlspecialchars((string) ($history['notes'] ?? ''), ENT_QUOTES, 'UTF-8') ?></p>
                  </div>
                </article>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>
