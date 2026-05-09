<?php
    $locationsList = App\Models\Location::where('publish', 1)->orderBy('id')->get();
?>
<section class="locations-section">
    <div class="locations-header">
        <h2 class="locations-heading">Our Locations</h2>
        <p class="locations-subheading">Visit us at any of our restaurant locations</p>
    </div>
    <div class="locations-grid">

        
        <div class="location-card">
            <div class="location-map">
                <?php echo applicationSettings('footer-contact-map-iframe'); ?>

            </div>
            <div class="location-info">
                <?php if(!empty($locationsList[0])): ?>
                    <div class="location-badge">
                        <span class="material-symbols-outlined">location_on</span>
                        <?php echo e($locationsList[0]->location_name); ?>

                    </div>
                <?php endif; ?>
                <ul class="location-details">
                    <li>
                        <span class="detail-icon"><span class="material-symbols-outlined">call</span></span>
                        <div class="detail-content">
                            <span class="detail-label">Phone Number</span>
                            <a href="tel:<?php echo e(applicationSettings('primary-phone-number')); ?>"><?php echo e(applicationSettings('primary-phone-number')); ?></a>
                        </div>
                    </li>
                    <li>
                        <span class="detail-icon"><span class="material-symbols-outlined">mail</span></span>
                        <div class="detail-content">
                            <span class="detail-label">Email</span>
                            <a href="mailto:<?php echo e(applicationSettings('primary-mail')); ?>"><?php echo e(applicationSettings('primary-mail')); ?></a>
                        </div>
                    </li>
                    <li>
                        <span class="detail-icon"><span class="material-symbols-outlined">pace</span></span>
                        <div class="detail-content">
                            <span class="detail-label">Opening Hours</span>
                            <a href="<?php echo e(url('/contact')); ?>"><?php echo applicationSettings('opening-hours'); ?></a>
                        </div>
                    </li>
                    <li>
                        <span class="detail-icon"><span class="material-symbols-outlined">add_location_alt</span></span>
                        <div class="detail-content">
                            <span class="detail-label">Address</span>
                            <a href="<?php echo e(url('/contact')); ?>"><?php echo applicationSettings('map-location'); ?></a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        
        <div class="location-card">
            <div class="location-map">
                <?php echo applicationSettings('location-2-map-iframe'); ?>

            </div>
            <div class="location-info">
                <?php if(!empty($locationsList[1])): ?>
                    <div class="location-badge">
                        <span class="material-symbols-outlined">location_on</span>
                        <?php echo e($locationsList[1]->location_name); ?>

                    </div>
                <?php endif; ?>
                <ul class="location-details">
                    <?php if(applicationSettings('location-2-phone')): ?>
                    <li>
                        <span class="detail-icon"><span class="material-symbols-outlined">call</span></span>
                        <div class="detail-content">
                            <span class="detail-label">Phone Number</span>
                            <a href="tel:<?php echo e(applicationSettings('location-2-phone')); ?>"><?php echo e(applicationSettings('location-2-phone')); ?></a>
                        </div>
                    </li>
                    <?php endif; ?>
                    <?php if(applicationSettings('location-2-mail')): ?>
                    <li>
                        <span class="detail-icon"><span class="material-symbols-outlined">mail</span></span>
                        <div class="detail-content">
                            <span class="detail-label">Email</span>
                            <a href="mailto:<?php echo e(applicationSettings('location-2-mail')); ?>"><?php echo e(applicationSettings('location-2-mail')); ?></a>
                        </div>
                    </li>
                    <?php endif; ?>
                    <?php if(applicationSettings('location-2-opening-hours')): ?>
                    <li>
                        <span class="detail-icon"><span class="material-symbols-outlined">pace</span></span>
                        <div class="detail-content">
                            <span class="detail-label">Opening Hours</span>
                            <a href="<?php echo e(url('/contact')); ?>"><?php echo applicationSettings('location-2-opening-hours'); ?></a>
                        </div>
                    </li>
                    <?php endif; ?>
                    <?php if(applicationSettings('location-2-map-location')): ?>
                    <li>
                        <span class="detail-icon"><span class="material-symbols-outlined">add_location_alt</span></span>
                        <div class="detail-content">
                            <span class="detail-label">Address</span>
                            <a href="<?php echo e(url('/contact')); ?>"><?php echo applicationSettings('location-2-map-location'); ?></a>
                        </div>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>

    </div>
</section>

<style>
/* ── Locations Section ── */
.locations-section {
    background: #111;
    padding: 80px 0 100px;
}

.locations-header {
    text-align: center;
    margin-bottom: 60px;
    padding: 0 20px;
}

.locations-heading {
    font-family: 'Laila', serif;
    font-size: 48px;
    font-weight: 700;
    color: #F7E8BF;
    margin: 0 0 12px;
    letter-spacing: -0.01em;
}

.locations-subheading {
    font-family: 'Poppins', sans-serif;
    font-size: 18px;
    font-weight: 300;
    color: rgba(255,255,255,0.6);
    margin: 0;
}

/* Grid */
.locations-grid {
    display: flex;
    gap: 40px;
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 40px;
}

/* Card */
.location-card {
    flex: 1;
    background: #1a1a1a;
    border-radius: 16px;
    overflow: hidden;
    border: 1px solid rgba(255,255,255,0.06);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.location-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 20px 60px rgba(0,0,0,0.4);
}

/* Map */
.location-card .location-map {
    position: relative;
    width: 100%;
    height: 280px;
    overflow: hidden;
    background: #222;
}
.location-card .location-map iframe,
.location-card .location-map p {
    position: static !important;
    width: 100% !important;
    height: 280px !important;
    margin: 0;
    display: block;
    border: none;
}
.location-card .location-map p {
    height: auto !important;
}

/* Info area */
.location-info {
    padding: 36px 36px 40px;
}

/* Badge */
.location-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: var(--primary-color, #C2333B);
    color: #fff;
    font-family: 'Poppins', sans-serif;
    font-size: 13px;
    font-weight: 600;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    padding: 8px 18px;
    border-radius: 8px;
    margin-bottom: 20px;
}
.location-badge .material-symbols-outlined {
    font-size: 18px;
    font-variation-settings: 'FILL' 1, 'wght' 400, 'GRAD' 0, 'opsz' 24;
}

/* Description */
.location-description {
    color: rgba(255,255,255,0.75);
    font-family: 'Poppins', sans-serif;
    font-size: 15px;
    line-height: 1.7;
    margin-bottom: 28px;
}
.location-description h2,
.location-description h3,
.location-description h4,
.location-description h5 {
    font-family: 'Laila', serif;
    font-size: 22px;
    font-weight: 700;
    color: #F7E8BF;
    margin: 0 0 8px;
}
.location-description p {
    margin: 0 0 6px;
    font-size: 15px;
    color: rgba(255,255,255,0.65);
}

/* Detail list */
.location-details {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    gap: 0;
}
.location-details li {
    display: flex;
    align-items: flex-start;
    gap: 16px;
    padding: 18px 0;
    border-top: 1px solid rgba(255,255,255,0.08);
}
.location-details li:last-child {
    padding-bottom: 0;
}

/* Icon circle */
.detail-icon {
    flex-shrink: 0;
    width: 44px;
    height: 44px;
    border-radius: 12px;
    background: rgba(194, 51, 59, 0.15);
    display: flex;
    align-items: center;
    justify-content: center;
}
.detail-icon .material-symbols-outlined {
    font-size: 22px;
    color: var(--primary-color, #C2333B);
    font-variation-settings: 'FILL' 1, 'wght' 400, 'GRAD' 0, 'opsz' 24;
}

/* Detail text */
.detail-content {
    display: flex;
    flex-direction: column;
    gap: 3px;
    min-width: 0;
}
.detail-label {
    font-family: 'Poppins', sans-serif;
    font-size: 12px;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.06em;
    color: rgba(255,255,255,0.4);
}
.detail-content a {
    font-family: 'Poppins', sans-serif;
    font-size: 16px;
    font-weight: 600;
    color: #fff;
    text-decoration: none;
    transition: color 0.2s;
    word-break: break-word;
}
.detail-content a:hover {
    color: #F7E8BF;
}

/* ── Responsive ── */
@media (max-width: 991px) {
    .locations-grid {
        flex-direction: column;
        gap: 30px;
        padding: 0 20px;
    }
    .locations-heading {
        font-size: 36px;
    }
    .locations-section {
        padding: 60px 0 80px;
    }
}

@media (max-width: 575px) {
    .location-info {
        padding: 28px 24px 32px;
    }
    .locations-heading {
        font-size: 30px;
    }
    .locations-subheading {
        font-size: 15px;
    }
    .location-card .location-map,
    .location-card .location-map iframe {
        height: 220px !important;
    }
    .detail-content a {
        font-size: 14px;
    }
}
</style>
<?php /**PATH /var/www/test/maharaja/resources/views/pages/location.blade.php ENDPATH**/ ?>