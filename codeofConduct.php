<?php
$pageTitle = 'Task House';
$activeNav = 'codeofConduct';

$sections = [
	['id' => 'description', 'title' => 'Description'],
	['id' => 'objectives', 'title' => 'Objectives'],
	['id' => 'values-philosophy', 'title' => 'Values and Philosophy'],
    ['id' => 'professional-practice', 'title' => 'Statement of Ethical Professional Practice'],
	['id' => 'attendance-punctuality', 'title' => 'Resoluition of Ethical Conflict'],
	['id' => 'ethics-compliance', 'title' => 'General Guidelines'],
	['id' => 'company-resources', 'title' => 'Corrective Actions'],
	['id' => 'disciplinary-actions', 'title' => 'Classification of Offenses'],
	['id' => 'acknowledgement', 'title' => 'Acknowledgement'],
];

$isSubmitted = ($_SERVER['REQUEST_METHOD'] ?? '') === 'POST' && !empty($_POST['coc_acknowledge']);

require __DIR__ . '/includes/header.php';
?>

<?php require __DIR__ . '/includes/sidebar.php'; ?>

<main class="app-main">
	<?php require __DIR__ . '/includes/app-header.php'; ?>

	<div class="container-fluid px-3 px-md-4 py-3 coc-page">
		<div class="row g-4">
			<!-- Mobile section dropdown -->
			<div class="col-12 d-lg-none">
				<button
					type="button"
					class="btn coc-mobile-toggle w-100 d-flex align-items-center justify-content-between"
					data-bs-toggle="collapse"
					data-bs-target="#cocMobileNav"
					aria-expanded="false"
					aria-controls="cocMobileNav"
				>
					<span class="coc-mobile-label">Navigate Sections</span>
					<i class="bi bi-chevron-down coc-mobile-caret" aria-hidden="true"></i>
				</button>

				<div class="collapse mt-2" id="cocMobileNav">
					<div class="card coc-nav-card">
						<div class="list-group list-group-flush">
							<?php foreach ($sections as $section): ?>
								<a class="list-group-item list-group-item-action coc-mobile-item" href="#<?= htmlspecialchars($section['id'], ENT_QUOTES, 'UTF-8') ?>">
									<?= htmlspecialchars($section['title'], ENT_QUOTES, 'UTF-8') ?>
								</a>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>

			<!-- Desktop sticky sidebar navigation -->
			<div class="col-lg-3 d-none d-lg-block">
				<div class="position-sticky coc-sticky">
					<div class="card coc-nav-card">
						<div class="card-body p-3">
							<div class="d-flex align-items-center gap-2 pb-3 mb-3 coc-nav-head">
								<i class="bi bi-file-earmark-text coc-nav-ico" aria-hidden="true"></i>
								<h3 class="m-0 coc-nav-title">Contents</h3>
							</div>
							<nav id="cocNav" class="nav nav-pills flex-column coc-nav" aria-label="Code of Conduct contents">
								<?php foreach ($sections as $section): ?>
									<a class="nav-link coc-nav-link" href="#<?= htmlspecialchars($section['id'], ENT_QUOTES, 'UTF-8') ?>">
										<?= htmlspecialchars($section['title'], ENT_QUOTES, 'UTF-8') ?>
									</a>
								<?php endforeach; ?>
							</nav>
						</div>
					</div>
				</div>
			</div>

			<!-- Main content area -->
			<div class="col-12 col-lg-9">
				<div class="card coc-paper border-0 shadow-sm">
					<!-- Header -->
					<div class="coc-paper-head px-3 px-md-4 py-4">
						<div class="d-flex flex-column flex-sm-row align-items-start justify-content-between gap-3">
							<div class="flex-grow-1">
								<h1 class="h2 h1-md mb-2 text-dark">Code of Conduct</h1>
								<p class="mb-2 text-secondary coc-subtitle">XIGNEX DIGITAL SOLUTIONS INC
                                    VIRTUAL BIZNEST</p>
								<div class="small text-muted">Last Updated: February 2026</div>
							</div>

							<a href="#" class="btn btn-outline-secondary d-inline-flex align-items-center gap-2 coc-download" role="button">
								<i class="bi bi-download" aria-hidden="true"></i>
								<span class="d-none d-sm-inline">Download PDF</span>
							</a>
						</div>
					</div>

					<!-- Content-->
					<div
						class="coc-content px-3 px-md-4 py-4"
						data-bs-spy="scroll"
						data-bs-target="#cocNav"
						data-bs-smooth-scroll="true"
						tabindex="0"
					>
						<!-- Description -->
						<section id="description" class="coc-section">
							<h2 class="h3 mb-3 text-dark">Description of the Code of Conduct</h2>
							<div class="coc-body text-dark">
								<p>
									This Code of Conduct embodies the rules, general policies and
                                    guidelines of the Company based on governing principles it adheres
                                    to and believes in.
								</p>
								<p>
									It is the basis by which all employees of the Company must conduct 
                                    themselves in order to succeed as employees; and which helps them 
                                    achieve or exceed the goals of the organization.
								</p>
								<p>
									These are the standards by which an employee is measured and rewarded or penalized.
								</p>

								<p>
									Specific expectations regarding the conduct of employees inside and outside of the company are enumerated including the corresponding corrective measures found in the latter portion of this Code of Conduct.
								</p>
								<p>
									The Company reserves the sole right to amend, change and enforce this Code at any time for any reason.
								</p>
								<p>
									In addition to the employee contract that the employee signs prior to or during his entry to the organization, this Code automatically forms part of the employee's employment contract.
								</p>
								<p>
									Employees are expected to read the entire manual carefully, learn its contents, and retain their copy for reference and compliance.
								</p>
								<p class="mb-0">
									The Administration & Human Resource Department will assist the employee on any inquiries on the contents hereof.
								</p>

							</div>
						</section>

						<hr class="my-5" />

						<!-- Objectives -->
						<section id="objectives" class="coc-section">
							<h2 class="h3 mb-3 text-dark">Objectives</h2>
							<div class="coc-body text-dark">
								<p>
									This Code aims to:
								</p>
								<ol class="ps-6 mb-3 coc-list" type="A">
									<li>
									    Define the employee's obligations and responsibilities in relation to his work, co-employees and the Company.
									</li>
									<li>
										Foster effective communications towards the realization of an efficient, productive and effective organization.
									</li>
									<li>
										Help create a working environment where all employees can function together harmoniously and cohesively as a productive and efficient team.
									</li>
								</ol>
                                <p>
									This Code of Conduct must be observed and followed. Corrective measures will be applied to those who fail to comply.
								</p>
                                <p>
                                    Any act not specifically covered by the Code which requires corrective action shall be handled by the Administration and Human Resource Department in a fair and just manner.
                                </p>
							</div>
						</section>

						<hr class="my-5" />

						<!-- Values and Philosophy -->
						<section id="values-philosophy" class="coc-section">
							<h2 class="h3 mb-3 text-dark">Values and Philosophy</h2>
							<div class="coc-body text-dark">
								<p><strong>
                                    Respect for the Individual
                                </strong>
								</p>
                                    <p class="lh-lg ps-5">
                                        Everyone in Virtual BizNest is committed to a work environment that is both profitable and fun.
Enthusiasm, strong work ethics, sense of humor, and good judgment are the basic values we nurture to create an atmosphere of excellence and a feeling of satisfaction and accomplishment.
                                    </p>
                                    <p class="lh-lg ps-5">
                                       We recognize each other for our competence and character. At all times, we exercise integrity and are honest.
                                    </p>
                                    <p class="lh-lg ps-5">
                                       We work as a team in the spirit of trust and cooperation. Through effective teamwork, we create powerful synergy.
                                    </p>
                                    <p class="lh-lg ps-5">
                                       We assist and support each other because we believe that we accomplish more by working together as a group.
                                    </p>
                                    <p class="lh-lg ps-5">
                                       We respect and appreciate each other's unique contribution to the team.
                                    </p>

                                <p>
                                <strong>
                                    Accountability
                                </strong>
                                </p>
                                    <p class="lh-lg ps-5">
                                      We count on each other to get the job done.
                                    </p>    
                                    <p class="lh-lg ps-5">
                                     We accept responsibility for our actions and their consequences.
                                    </p>    
                                    <p class="lh-lg ps-5">
                                     We learn from our mistakes.
                                    </p>    
                                    <p class="lh-lg ps-5">
                                     We do not frame or blame others.
                                    </p>    
                                    
                                     <p>
                                <strong>
                                    Meritocracy
                                </strong>
                                </p>
                                    <p class="lh-lg ps-5">
                                     The Company adheres to the principle of meritocracy. Opportunities for growth, responsibility and income are available to everyone who contributes to the success of the organization.
                                    </p>    
                                    <p class="lh-lg ps-5">
                                     The Company prefers to present new opportunities to qualified employees before looking outside the organization.
                                    </p>    

                                       <p>
                                <strong>
                                    Life and Work Ethics
                                </strong>
                                </p>
                                    <p class="lh-lg ps-5">
                                      At Virtual BizNest, no business requirement ever justifies an illegal act.
                                    </p>    
                                    <p class="lh-lg ps-5">
                                     Everyone is required to uphold the highest standards in ethical and professional practices.
                                    </p>    
                                    <p class="lh-lg ps-5">
                                    Each of us is personally committed to productivity.
                                    </p>    
                                    <p class="lh-lg ps-5">
                                     We are committed to getting the job done and approaching our daily work with gritty determination.
                                    </p>    
                                    <p class="lh-lg ps-5">
                                     We assist and support each other because we believe that we accomplish more by working together as a group.
                                    </p>    
                                    <p class="lh-lg ps-5">
                                     We celebrate and support those carrying the heaviest loads.
                                    </p>    

                                <p>
                                <strong>
                                    Operational Excellence
                                </strong>
                                </p>
                                    <p class="lh-lg ps-5">
                                     Quality and excellence is our way of life.
                                    </p>    
                                    <p class="lh-lg ps-5">
                                     Excellence is reflected in how we design our processes, serve our clients, handle support customers, and behave toward each other.
                                    </p>    

									<p>
                                <strong>
                                    Superior Client Value
                                </strong>
                                </p>
                                    <p class="lh-lg ps-5">
                                     Everyone at Virtual BizNest exists to deliver incomparable service to our clients.
                                    </p>    
                                    <p class="lh-lg ps-5">
                                     The Company's leadership and superior financial performance in the industry are natural results of our ability to understand client needs, meet client requirements, and exceed client expectations.
We will always remember that we are a service company.
                                    </p>    
									<p class="lh-lg ps-5">
                                     Every communication with clients is handled with diplomacy, friendliness and professionalism.
                                    </p>    

								<p>
                                <strong>
                                    Cost Leadership
                                </strong>
                                </p>
                                    <p class="lh-lg ps-5">
                                     In order to deliver superior value, we offer our services at competitive prices.
                                    </p>    
                                    <p class="lh-lg ps-5">
                                     We will only invest money where it creates value for clients.
									</p>
                                    <p class="lh-lg ps-5">
                                     We are committed to being cost conscious, thrifty and good stewards over our resources.
									</p>
                                   

								

						<!-- Acknowledgement -->
						<section id="acknowledgement" class="coc-section">
							<h2 class="h3 mb-3 text-dark">Acknowledgement</h2>
							<div class="coc-body text-dark">
								<p>
									By acknowledging this Code of Conduct, you confirm that you have read, understood, and
									agree to comply with all policies and standards outlined in this document. Your
									acknowledgement serves as a commitment to uphold these principles in your daily work and
									interactions.
								</p>

								<?php if (!$isSubmitted): ?>
									<div class="alert alert-primary coc-ack" role="alert">
										<form method="post" class="m-0">
											<div class="d-flex gap-3 align-items-start">
												<input
													class="form-check-input mt-1 coc-check"
													type="checkbox"
													id="coc_acknowledge"
													name="coc_acknowledge"
													value="1"
													required
												/>
												<label class="form-check-label text-dark" for="coc_acknowledge">
													I acknowledge that I have read and understood the Code of Conduct. I agree to
													comply with all policies and standards outlined in this document and understand
													that violations may result in disciplinary action.
												</label>
											</div>

											<div class="d-flex flex-wrap gap-2 mt-3">
												<button type="submit" class="btn btn-primary coc-submit">Agree &amp; Submit</button>
												<a href="#" class="btn btn-outline-secondary" role="button">Download Copy</a>
											</div>
										</form>
									</div>
								<?php else: ?>
									<div class="alert alert-success coc-success" role="alert">
										<div class="d-flex align-items-start gap-3">
											<div class="coc-success-ico" aria-hidden="true">
												<i class="bi bi-check2"></i>
											</div>
											<div>
												<div class="h5 mb-1">Acknowledgment Submitted Successfully</div>
												<div class="small">
													Your acknowledgement has been recorded. Thank you for your commitment to our
													Code of Conduct.
												</div>
												<a href="#" class="btn btn-outline-success mt-3" role="button">Download Copy</a>
											</div>
										</div>
									</div>
								<?php endif; ?>
							</div>
						</section>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

<?php require __DIR__ . '/includes/footer.php'; ?>
