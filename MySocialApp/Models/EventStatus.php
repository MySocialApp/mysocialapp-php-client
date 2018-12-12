<?php

namespace MySocialApp\Models;

/**
 * Class EventStatus
 * @package MySocialApp\Models
 */
class EventStatus {
    const _WANT_TO_PARTICIPATE = "WANT_TO_PARTICIPATE";
    const _WAITING_CONFIRMATION = "WAITING_CONFIRMATION";
    const _CONFIRMED = "CONFIRMED";
    const _WAITING_FOR_FREE_SEAT = "WAITING_FOR_FREE_SEAT";
    const _NO_RESPONSE = "NO_RESPONSE";
    const _NOT_AVAILABLE = "NOT_AVAILABLE";
    const _HAS_CANCELLED = "HAS_CANCELLED";
    const _HAS_CANCELLED_AFTER_HAVING_CONFIRMED = "HAS_CANCELLED_AFTER_HAVING_CONFIRMED";
}