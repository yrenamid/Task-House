<?php
$pageTitle = 'Task House';
$activeNav = 'codeofConduct';

$sections = [
	['id' => 'description', 'title' => 'Description'],
	['id' => 'objectives', 'title' => 'Objectives'],
	['id' => 'values-philosophy', 'title' => 'Values and Philosophy'],
    ['id' => 'professional-practice', 'title' => 'Statement of Ethical Professional Practice'],
	['id' => 'ethical-conflict', 'title' => 'Resolution of Ethical Conflict'],
	['id' => 'general-guidelines', 'title' => 'General Guidelines'],
	['id' => 'disciplinary-procedures', 'title' => 'Disciplinary Procedures'],
	['id' => 'corrective-actions', 'title' => 'Corrective Actions'],
	['id' => 'classification-offenses', 'title' => 'Classification of Offenses'],
	['id' => 'nature-offense-business', 'title' => 'Nature of Offense and Impact to Business'],
	['id' => 'reset-period', 'title' => 'Reset Period'],
	['id' => 'prescription-clause', 'title' => 'Prescription Clause'],
	['id' => 'repealing-clause', 'title' => 'Repealing Clause'],
	['id' => 'separability-clause', 'title' => 'Separability Clause'],
	['id' => 'effectivity-clause', 'title' => 'Effectivity Clause'],
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
                <button type="button"
                    class="btn coc-mobile-toggle w-100 d-flex align-items-center justify-content-between"
                    data-bs-toggle="collapse" data-bs-target="#cocMobileNav" aria-expanded="false"
                    aria-controls="cocMobileNav">
                    <span class="coc-mobile-label">Navigate Sections</span>
                    <i class="bi bi-chevron-down coc-mobile-caret" aria-hidden="true"></i>
                </button>

                <div class="collapse mt-2" id="cocMobileNav">
                    <div class="card coc-nav-card">
                        <div class="list-group list-group-flush">
                            <?php foreach ($sections as $section): ?>
                            <a class="list-group-item list-group-item-action coc-mobile-item"
                                href="#<?= htmlspecialchars($section['id'], ENT_QUOTES, 'UTF-8') ?>">
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
                            <nav id="cocNav" class="nav nav-pills flex-column coc-nav"
                                aria-label="Code of Conduct contents">
                                <?php foreach ($sections as $section): ?>
                                <a class="nav-link coc-nav-link"
                                    href="#<?= htmlspecialchars($section['id'], ENT_QUOTES, 'UTF-8') ?>">
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

                            <a href="#"
                                class="btn btn-outline-secondary d-inline-flex align-items-center gap-2 coc-download"
                                role="button">
                                <i class="bi bi-download" aria-hidden="true"></i>
                                <span class="d-none d-sm-inline">Download PDF</span>
                            </a>
                        </div>
                    </div>

                    <!-- Content-->
                    <div class="coc-content px-3 px-md-4 py-4" data-bs-spy="scroll" data-bs-target="#cocNav"
                        data-bs-smooth-scroll="true" tabindex="0">
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
                                    Specific expectations regarding the conduct of employees inside and outside of the
                                    company are enumerated including the corresponding corrective measures found in the
                                    latter portion of this Code of Conduct.
                                </p>
                                <p>
                                    The Company reserves the sole right to amend, change and enforce this Code at any
                                    time for any reason.
                                </p>
                                <p>
                                    In addition to the employee contract that the employee signs prior to or during his
                                    entry to the organization, this Code automatically forms part of the employee's
                                    employment contract.
                                </p>
                                <p>
                                    Employees are expected to read the entire manual carefully, learn its contents, and
                                    retain their copy for reference and compliance.
                                </p>
                                <p class="mb-0">
                                    The Administration & Human Resource Department will assist the employee on any
                                    inquiries on the contents hereof.
                                </p>
                                    <hr class="my-5" />
                            </div>
                        </section>

                        

                        <!-- Objectives -->
                        <section id="objectives" class="coc-section">
                            <h2 class="h3 mb-3 text-dark">Objectives</h2>
                            <div class="coc-body text-dark">
                                <p>
                                    This Code aims to:
                                </p>
                                <ol class="ps-6 mb-3 coc-list" type="A">
                                    <li>
                                        Define the employee's obligations and responsibilities in relation to his work,
                                        co-employees and the Company.
                                    </li>
                                    <li>
                                        Foster effective communications towards the realization of an efficient,
                                        productive and effective organization.
                                    </li>
                                    <li>
                                        Help create a working environment where all employees can function together
                                        harmoniously and cohesively as a productive and efficient team.
                                    </li>
                                </ol>
                                <p>
                                    This Code of Conduct must be observed and followed. Corrective measures will be
                                    applied to those who fail to comply.
                                </p>
                                <p>
                                    Any act not specifically covered by the Code which requires corrective action shall
                                    be handled by the Administration and Human Resource Department in a fair and just
                                    manner.
                                </p>
                                <hr class="my-5" />
                            </div>
                        </section>

                        

                        <!-- Values and Philosophy -->
                        <section id="values-philosophy" class="coc-section">
                            <h2 class="h3 mb-3 text-dark">Values and Philosophy</h2>
                            <div class="coc-body text-dark">
                                <p><strong>
                                        Respect for the Individual
                                    </strong>
                                </p>
                                <p class="lh-lg ps-5">
                                    Everyone in Virtual BizNest is committed to a work environment that is both
                                    profitable and fun.
                                    Enthusiasm, strong work ethics, sense of humor, and good judgment are the basic
                                    values we nurture to create an atmosphere of excellence and a feeling of
                                    satisfaction and accomplishment.
                                </p>
                                <p class="lh-lg ps-5">
                                    We recognize each other for our competence and character. At all times, we exercise
                                    integrity and are honest.
                                </p>
                                <p class="lh-lg ps-5">
                                    We work as a team in the spirit of trust and cooperation. Through effective
                                    teamwork, we create powerful synergy.
                                </p>
                                <p class="lh-lg ps-5">
                                    We assist and support each other because we believe that we accomplish more by
                                    working together as a group.
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
                                    The Company adheres to the principle of meritocracy. Opportunities for growth,
                                    responsibility and income are available to everyone who contributes to the success
                                    of the organization.
                                </p>
                                <p class="lh-lg ps-5">
                                    The Company prefers to present new opportunities to qualified employees before
                                    looking outside the organization.
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
                                    Everyone is required to uphold the highest standards in ethical and professional
                                    practices.
                                </p>
                                <p class="lh-lg ps-5">
                                    Each of us is personally committed to productivity.
                                </p>
                                <p class="lh-lg ps-5">
                                    We are committed to getting the job done and approaching our daily work with gritty
                                    determination.
                                </p>
                                <p class="lh-lg ps-5">
                                    We assist and support each other because we believe that we accomplish more by
                                    working together as a group.
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
                                    Excellence is reflected in how we design our processes, serve our clients, handle
                                    support customers, and behave toward each other.
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
                                    The Company's leadership and superior financial performance in the industry are
                                    natural results of our ability to understand client needs, meet client requirements,
                                    and exceed client expectations.
                                    We will always remember that we are a service company.
                                </p>
                                <p class="lh-lg ps-5">
                                    Every communication with clients is handled with diplomacy, friendliness and
                                    professionalism.
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
                                    We are committed to being cost conscious, thrifty and good stewards over our
                                    resources.
                                </p>

                                <p>
                                    <strong>
                                        Knowledge
                                    </strong>
                                </p>
                                <p class="lh-lg ps-5">
                                    We recognize each other's capacity for growth and improvement, and commit ourselves
                                    to lifelong learning and continuous professional development.
                                </p>
                                <p class="lh-lg ps-5">
                                    We actively seek knowledge, experience and the insight of others.
                                </p>
                                <hr class="my-5" />
                            </div>
                        </section>

                        

                        <!-- STATEMENT OF ETHICAL PROFESSIONAL PRACTICE -->
                        <section id="professional-practice" class="coc-section">
                            <h2 class="h3 mb-3 text-dark">Statement of Professional Practice</h2>
                            <div class="coc-body text-dark">

                                <p class="lh-lg ps-5">
                                    All at Virtual BizNest shall behave ethically and embrace the overarching principles
                                    that express our values and observe the Standards that guide our conduct.
                                </p>

                                <p>
                                    <strong>
                                        Principles
                                    </strong>
                                </p>

                                <p class="lh-lg ps-5">
                                    The Company espouses the overarching ethical principles of honesty, fairness,
                                    objectivity and responsibility. Everyone shall act in accordance with these
                                    principles and shall encourage others within the organization to adhere to them.
                                </p>

                                <p>
                                    <strong>
                                        Standards
                                    </strong>
                                </p>

                                <p class="lh-lg ps-5">
                                    An employee's conduct must be guided by the following standards. Failure to comply
                                    may result to a corrective action:
                                </p>

                                <p class="lh-lg ps-3">
                                    1. Competence
                                </p>
                                <p class="lh-lg ps-3">
                                    Each employee has a responsibility to:
                                </p>
                                <p class="lh-lg ps-5">
                                    Perform professional duties in accordance with all laws, regulations and technical
                                    standards
                                    provide decision support information and recommendations that are accurate, clear,
                                    concise and timely.
                                </p>
                                <p class="lh-lg ps-5">
                                    Recognize and communicate professional limitations or other constraints that will
                                    preclude responsible judgment or successful performance of an activity.
                                </p>
                                <p class="lh-lg ps-5">
                                    Work with intensity or focus on assigned tasks and duties
                                    maintain, if not surpass, the level of performance, competence and standard of work
                                    set by the company.
                                </p>
                                <p class="lh-lg ps-5">
                                    Maintain an appropriate level of professional expertise by continually developing
                                    relevant knowledge and skills.
                                </p>

                                <p class="lh-lg ps-3">
                                    2. Confidentiality
                                </p>
                                <p class="lh-lg ps-3">
                                    Each employee has a responsibility to:
                                </p>
                                <p class="lh-lg ps-5">
                                    Keep information confidential except when disclosure is authorized or legally
                                    required
                                    inform all relevant parties regarding appropriate use of confidential information
                                    and monitor subordinates' activities to ensure compliance.
                                </p>
                                <p class="lh-lg ps-5">
                                    Refrain from using confidential information for unethical or illegal advantage.
                                </p>
                                <p class="lh-lg ps-5">
                                    Acknowledge, accept and agree that all projects, conceptions, creations, work
                                    output, products, results, innovations, discoveries and ideas created, manufactured,
                                    built and/or accomplished during the term of their employment and all proprietary
                                    rights and privileges attendant to its creation, manufacturing, building
                                    and/accomplishment shall belong and pertain exclusively to the Company.
                                </p>

                                <p class="lh-lg ps-3">
                                    3. Integrity
                                </p>
                                <p class="lh-lg ps-3">
                                    Each employee has a responsibility to:
                                </p>
                                <p class="lh-lg ps-5">
                                    Mitigate actual conflicts of interest, regularly communicate with business
                                    associates to avoid apparent conflicts of interest and advise all parties of any
                                    potential conflicts.
                                </p>
                                <p class="lh-lg ps-5">
                                    Refrain from engaging in any conduct that will prejudice carrying out duties
                                    ethically.
                                </p>
                                <p class="lh-lg ps-5">
                                    Abstain from engaging in or supporting any activity that may discredit the
                                    organization.
                                </p>
                                <p class="lh-lg ps-5">
                                    Work diligently to advance the interest of the Company.
                                </p>

                                <p class="lh-lg ps-3">
                                    4. Credibility
                                </p>
                                <p class="lh-lg ps-3">
                                    Each employee has a responsibility to:
                                </p>
                                <p class="lh-lg ps-5">
                                    Be honest.
                                </p>
                                <p class="lh-lg ps-5">
                                    Communicate information fairly and objectively. </p>
                                <p class="lh-lg ps-5">
                                    Disclose all relevant information that can reasonably be expected to influence an
                                    intended user's understanding of the reports, analyses or recommendations. </p>
                                <p class="lh-lg ps-5">
                                    Disclose delays or deficiencies in information, timeliness, processing or internal
                                    controls in conformity with Virtual BizNest policies and/or applicable law. </p>

                                <p class="lh-lg ps-3">
                                    5. Company Representation to the Public
                                </p>
                                <p class="lh-lg ps-5">
                                    The CEO or his representative is authorized to issue statement, represent and
                                    communicate with the media for and in behalf of the company. Any other person/s
                                    aside from the two mentioned will have to be authorized by the CEO to be able to do
                                    so.
                                </p>
                                <p class="lh-lg ps-5">
                                    No employee of the Company while employed, shall in any way communicate with the
                                    media, write articles or sponsor or initiate one that projects the company in a bad
                                    light in any way, shape or form
                                </p>
                                <p class="lh-lg ps-3">
                                    6. Consensual Relationships
                                </p>
                                <p class="lh-lg ps-5">
                                    The Company is NOT against consensual relationship between two employees.
                                </p>
                                <p class="lh-lg ps-5">
                                    The Company however does not approve of consensual relationship between a supervisor
                                    and a subordinate within the same team or department.
                                </p>
                                <p class="lh-lg ps-5">
                                    If the relationship however is borne of true affection, then this relationship must
                                    be transparent and reported to the company.
                                </p>
                                <p class="lh-lg ps-5">
                                    The latter shall then initiate the transfer of one party involved to another
                                    department or team. This protects the individuals involved against issues like
                                    conflict of interest.
                                </p>
                                    <hr class="my-5" />
                            </div>
                        </section>

                        

                        <!-- RESOLUTION OF ETHICAL CONFLICT-->
                        <section id="ethical-conflict" class="coc-section">
                            <h2 class="h3 mb-3 text-dark">Resolution of Ethical Conflict</h2>
                            <div class="coc-body text-dark">

                                <p class="lh-lg ps-2">
                                    In applying the Standards of Ethical Professional Practice, you may encounter
                                    problems identifying unethical behavior or resolving an ethical conflict.
                                </p>
                                <p class="lh-lg ps-2">
                                    When faced with ethical issues, please follow the Company's established policies on
                                    the resolutions of such conflict.
                                </p>
                                <p class="lh-lg ps-2">
                                    If these policies do not resolve the ethical conflict, consider the following
                                    courses of action:
                                </p>

                                <ol class="lh-lg ps-5">
                                    <li>
                                        Discuss the issue with your immediate supervisor.
                                    </li>
                                    <li>
                                        If it appears that your immediate supervisor is involved or if you cannot
                                        achieve a satisfactory resolution, submit the issue to the Manager.
                                    </li>
                                    <li>
                                        If after the fact it is still not resolved, escalate it to Human Resources.
                                    </li>
                                    <li>
                                        For those who render support activities like Accounting, Human Resources or
                                        Technical Support staff - report and discuss the matter with your immediate
                                        supervisor, then to the Department Head.
                                    </li>
                                    <li>
                                        Communication of such issues/problems to authorities or individuals not employed
                                        or engaged by the Company is not appropriate, unless you believe there is a
                                        clear violation of the law.
                                    </li>
                                </ol>
                        <hr class="my-5" />

                            </div>
                        </section>


                        <!-- GENERAL GUIDELINES-->
                        <section id="general-guidelines" class="coc-section">
                            <h2 class="h3 mb-3 text-dark">General Guidelines</h2>
                            <div class="coc-body text-dark">
                                <ol class="lh-lg ps-5">
                                    <li>
                                        The Code of Conduct shall apply to all employees of the Company:
                                        <ul class="lh-lg ps-5">
                                            <li>
                                                while they are inside the company premises on duty or off duty
                                            </li>
                                            <li>
                                                while they are outside the company premises on duty
                                            </li>
                                            <li class="mb-3">
                                                while they are outside the company premises off duty, provided that the
                                                incident is connected with their work, or results to damage or prejudice
                                                to the company
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="mb-3">
                                        The Code is not intended to be restrictive or all encompassing. Offenses not
                                        included or defined in the Code shall be treated on a case-to-case basis with
                                        due regard to the existing applicable Philippine labor laws and jurisprudence.
                                    </li>
                                    <li class="mb-3">
                                        Ignorance of Company policies, rules and regulations shall not excuse any
                                        employee from complying therewith, from being subjected to appropriate actions
                                        or from serving the penalties herein contained or promulgated hereafter.
                                    </li>
                                    <li class="mb-3">
                                        Any or all acts violating and/or constituting a violation of the Code or of any
                                        Company policy, rule or regulation shall be considered as an offense and the
                                        erring employee shall be subjected to the appropriate corrective action.
                                    </li>
                                    <li class="mb-3">
                                        The classification of the offenses listed hereunder is merely descriptive and
                                        shall in no way affect the true nature and character of the offense committed in
                                        relation to existing provisions of the Labor Code of the Philippines and other
                                        similar laws and regulations.
                                    </li>
                                    <li class="mb-3">
                                        Offenses committed will be treated cumulatively and jointly even if they fall
                                        under a different type of category of offense.
                                    </li>
                                    <li class="mb-3">
                                        The employee may be penalized regardless of whether the commission of the
                                        offense is consecutive or not.
                                    </li>
                                    <li class="mb-3">
                                        Corrective actions shall be imposed by the immediate supervisor of the affected
                                        employee with the assistance of the Office of Administration & Human Resource.
                                    </li>
                                    <li class="mb-3">
                                        The corrective penalty of suspension shall be without pay. In no case will
                                        suspension from work be charged to earned leave benefits. Service of the
                                        suspension shall be during working days.
                                    </li>
                                    <li class="mb-3">
                                        <p>Effectivity days of suspension cases will be at the discretion of the
                                            immediate supervisor or team leader who will schedule the dates of such
                                            suspension.</p>
                                        <p>
                                            The days of suspension may not be successive. The company has the option as
                                            to what days the employee will serve their suspension.
                                        </p>
                                        <p>
                                            Implementation of the corrective action will be carried out regardless of
                                            the employee's refusal to receive corrective penalty. Such tender and
                                            refusal should be indicated in the WN Form. A witness shall be called to
                                            attest to such refusal and a copy of the WN Form shall be sent to the
                                            employee at his/her last known address by registered mail.
                                        </p>
                                    </li>
                                    <li>
                                        Implementation of corrective action on erring employees shall not prevent the
                                        Company from instituting civil and/or criminal actions against them in
                                        accordance with the applicable laws of the Philippines.
                                    </li>
                                    <li>
                                        The Company reserves the right to suspend any or all provisions in this Code and
                                        those that may be promulgated hereafter, and to be lenient in meritorious cases.
                                    </li>
                                    <li>
                                        The Company reserves the right to impose a heavier or lighter penalty other than
                                        provided herein, whenever the circumstances of the case so warrant, taking into
                                        account the nature of the offense and the gravity thereof.
                                    </li>
                                    <li>
                                        Failure of the Company to apply and impose the corresponding corrective sanction
                                        as provided herein shall not constitute a waiver of its right to enforce the
                                        provisions contained herein for similar acts committed in the future.
                                    </li>
                                    <li>
                                        <p>The Company, whenever necessary, may promulgate such other policies, rules
                                            and regulations relative to discipline which shall be deemed automatically
                                            incorporated in this Code.</p>
                                        <p>The Company may also delete, amend or revise existing definitions and/or
                                            penalties.</p>
                                    </li>
                                    <li>
                                        <p>In case of irreconcilable conflict between the provisions of this Code and
                                            those of other policies, rules and regulations, the more recent provision
                                            shall prevail over a previous one.</p>
                                        <p>Unless necessarily modified therein, other policies, rules and regulations
                                            shall be applied in consideration of the nature of operations or functions
                                            of the department, section or position where the employee is assigned.</p>
                                    </li>
                                </ol>
                        <hr class="my-5" />

                            </div>
                        </section>


                        <!-- DISCIPLINARY PROCEDURES -->
                        <section id="disciplinary-procedures" class="coc-section">
                            <h2 class="h3 mb-3 text-dark">Disciplinary Procedures</h2>
                            <div class="coc-body text-dark">
                                <p>
                                    The following guidelines and procedures shall be observed by the Company in the
                                    implementation of corrective action under this Code:
                                </p>
                                <ol class="ps-6 coc-list" type="A">
                                    <li>
                                        FOR OFFENSES WHERE THE IMPOSABLE SANCTION IS NOT SUSPENSION OR DISMISSAL
                                        <ol>
                                            <li class="mb-3">
                                                The Company shall issue a written notice to the employee.
                                            </li>
                                            <li class="mb-3">
                                                <p>The employee shall submit, within twenty-four (24) hours from the
                                                    time of their receipt of the written notice, their written
                                                    explanation and their </p><!-----FOR CLARIFICATION--->
                                                <p>Failure of the employee to submit their written explanation within
                                                    the prescribed period shall be considered a waiver of their right to
                                                    answer the charges against them.reasons why no corrective action
                                                    should be taken against them.</p>
                                            </li>
                                            <li>
                                                After receipt of the written explanation or if the employee shall have
                                                failed to submit their written explanation after the lapse of
                                                twenty-four (24) hours from the time the employee received his/her
                                                written notices, the Company shall render its decision in writing, make
                                                a brief finding therein and shall serve a copy thereof to the employee.
                                            </li>
                                        </ol>
                                    </li>
                                    <li>
                                        FOR DEVIATIONS WHERE THE IMPOSABLE SANCTION IS SUSPENSION OR TERMINATION
                                        <ol>
                                            <li class="mb-3">
                                                The Company shall issue a written notice to the employee.
                                            </li>
                                            <li class="mb-3">
                                                <p>
                                                    The employee shall submit, within twenty-four (24) hours from the
                                                    time of their receipt of the written notice, their written
                                                    explanation and their reasons why no corrective action should be
                                                    taken against them.
                                                </p>
                                                <p>
                                                    Failure of the employee to submit their written explanation within
                                                    the prescribed period shall be considered a waiver of their right to
                                                    answer the charges against them.
                                                </p>
                                            </li>
                                            <li class="mb-3">
                                                Upon receipt of the written explanation or after the lapse of the
                                                24-hour period without the employee submitting their written explanation
                                                and reasons why they should not be suspended or terminated, the Company
                                                shall schedule an investigation or administrative hearing.
                                            </li>
                                            <li class="mb-3">
                                                At the investigation or administrative hearing, the personal presence of
                                                the employee is required.
                                                Failure of the employee to attend this investigation or administrative
                                                hearing without justifiable excuse shall be considered a waiver of their
                                                right to adduce evidence in their defense
                                                If they so desire, the employee may be assisted by their counsel at the
                                                investigation/administrative hearing.
                                            </li>
                                            <li class="mb-3">
                                                The employee may request that the investigation be reset to another date
                                                only on the account that their counsel will be not be available on the
                                                original date set. Only one resetting shall be allowed.
                                            </li>
                                            <li class="mb-3">
                                                <p>
                                                    In the investigation or administrative hearing, the employee
                                                    concerned shall be given an opportunity to adduce their defense to
                                                    the charges leveled against them.
                                                </p>
                                                <p>
                                                    The Company shall have the sole discretion to terminate the formal
                                                    investigation.
                                                    After the completion of the formal investigation, the Company shall
                                                    assess and evaluate the evidence and determine whether or not the
                                                    employee is guilty thereof, and if guilty, impose therein the
                                                    appropriate penalty/ies.
                                                </p>
                                                <p>
                                                    The decision of the Company to suspend or terminate the employee
                                                    shall be in writing and shall be served upon the employee concerned.
                                                </p>
                                            </li>
                                            <li class="mb-3">
                                                The Company may, pending the investigation of the charge(s), place the
                                                employee under preventive suspension, if their continued employment
                                                poses a serious and imminent threat to the life or property of the
                                                employer or their co-employees, or may obstruct the investigation.
                                            </li>
                                        </ol>
                                    </li>
                                    <li class="mb-3">
                                        If it appears that your immediate supervisor is involved or if you cannot
                                        achieve a satisfactory resolution, submit the issue to the Manager.
                                    </li>
                                    <li class="mb-3">
                                        For those who render support activities like Accounting, Human Resources or
                                        Technical Support staff - report and discuss the matter with your immediate
                                        supervisor, then to the Department Head.
                                    </li>
                                    <li class="mb-3">
                                        Communication of such issues/problems to authorities or individuals not employed
                                        or engaged by the Company is not appropriate, unless you believe there is a
                                        clear violation of the law.
                                    </li>
                                </ol>
                                <hr class="my-5" />
                            </div>
                        </section>

                        

                        <!-- CORRECTIVE ACTIONS -->
                        <section id="corrective-actions" class="coc-section">
                            <h2 class="h3 mb-3 text-dark">Corrective Actions</h2>
                            <div class="coc-body text-dark">
                                <p>
                                    Virtual BizNest requires everyone to adhere to the Code of Conduct to ensure proper
                                    decorum and set the norm of conduct for all its employees.
                                </p>
                                <p>
                                    In cases of deviation from the same, the following corrective measures, as
                                    appropriate, may be administered.
                                </p>
                                <ol class="ps-6 coc-list">
                                    <li class="mb-3">
                                        Verbal Reprimand.
                                    </li>
                                    <li class="mb-3">
                                        <p>
                                            Corrective Counseling - At the discretion of the Company, counseling of the
                                            erring employee may be held after office hours to instill in the employee
                                            the knowledge that there is a penalty for the offense(s) committed.
                                        </p>
                                        <p>
                                            Hours spent for corrective counseling shall not entitle the erring employee
                                            to receive pay.
                                        </p>
                                    </li>
                                    <li class="mb-3">
                                        Written Warning - A written warning is a more serious action than corrective
                                        counseling. Supporting documents or a report of the deviations must be attached
                                        to the Notice of Corrective Action Form, which shall be used for documentation.
                                    </li>
                                    <li class="mb-3">
                                        <p>Suspension - This is the compulsory and temporary absence of the employee
                                            from work on a no-pay status as a result of a repeated violation of a
                                            Company policy, rule or regulation or a serious infraction that requires a
                                            more severe action.

                                        </p>
                                        <p>
                                            The Notice of Corrective Action Form will still be used for documentation.
                                        </p>
                                        <p>
                                            The prescribed number of days per offense is the maximum suspension that may
                                            be imposed. However, the Manager, with the concurrence of Human Resources
                                            Manager, may reduce or increase the number of days based on mitigating
                                            and/or aggravating circumstances attending the particular case.
                                        </p>
                                    </li>
                                    <li class="mb-3">
                                        Termination - This is the most serious form of employee corrective action which
                                        becomes necessary when all attempts to correct the misdemeanor have failed or
                                        where, because of the gravity of the offense, dismissal is specifically resorted
                                        to per Company rules and regulations even for first offenders.

                                </ol>
                                <hr class="my-5" />
                            </div>
                        </section>

                        

                        <!-- CLASSSIFICATION OF OFFENSES -->
                        <section id="classification-offenses" class="coc-section">
                            <h2 class="h3 mb-3 text-dark">Classification of Offenses</h2>
                            <div class="coc-body text-dark">
                                <ol class="lh-lg ps-5">
                                    <li class="mb-3">
                                        <strong>MINOR OFFENSES</strong>
                                        - Infractions or offenses considered minor. The corrective action shall be
                                        Corrective Counseling, Verbal Warning or Written Warning only.
                                    </li>
                                    <li class="mb-3">
                                        <strong>LESS GRAVE OFFENSES</strong>
                                        – Infractions or offenses that are regarded serious in nature and have a
                                        negative impact on the organization's business, employee morale, property, and
                                        general business operations. The corrective action shall be up to Suspension.
                                    </li>
                                    <li class="mb-3">
                                        <strong>GRAVE OFFENSES</strong>
                                        – Infractions or offenses that adversely affect the company and the entire
                                        organization; the severity of such infractions could cause major disruption and
                                        jeopardize the company's stability. The corrective action shall be up to
                                        Termination.
                                    </li>
                                </ol>
                                <hr class="my-5" />
                            </div>
                        </section>

                        

                        <!--  NATURE OF OFFENSE AND IMPACT TO BUSINESS -->
                        <section id="nature-offense-business" class="coc-section">
                            <h2 class="h3 mb-3 text-dark">Nature of Offense and Impact to Business</h2>
                            <div class="coc-body text-dark">
                                <p class="lh-lg ps-3">
                                    The Table of Offenses found in the Code outlines the actions/behaviors the Company
                                    deems to have a negative impact to its operations and business.An explanation of the
                                    category or nature of the offenses is provided therein together with the specific
                                    list of offenses falling under each category and a brief explanation of such.
                                </p>
                                <ol class="lh-lg ps-5">
                                    <li class="mb-3">
                                        <p>Violation of Performance Standards</p>
                                        <p>Performance standards are the minimum requirements of a job to ensure the
                                            continued existence of the Company.</p>
                                        <p>The nature of the business of the Company dictates that in each and every
                                            project, timeliness, accuracy and credibility are of the essence.</p>
                                        <p>When violations against performance standards are committed, the Company
                                            suffers repercussions ranging from a simple delay in the delivery of the
                                            project to client dissatisfaction to losing the project and the client
                                            entirely.</p>
                                        <p>It is, therefore, of paramount interest to the Company that employees are
                                            present and on time during the shift; that each employee performs each job
                                            according to the standards of quality, work ethics and professionalism; and
                                            that work continues undisrupted throughout the business year.</p>
                                    </li>
                                    <li class="mb-3">
                                        <p>Violation Against Professional and Interpersonal Relationships</p>
                                        <p>The existence of good professional and interpersonal relationships contribute
                                            to employee satisfaction and retention.</p>
                                        <p>It is the goal of the Company that employees are able to communicate their
                                            thoughts and feelings to their superiors and peers appropriately without
                                            fear and hesitation.</p>
                                        <p>Acts that harm the harmonious interpersonal relationships in the workplace
                                            negatively impact the operations of the Company because the same may cause
                                            high employee turnover, poor quality of work, project delays and eventually,
                                            unsatisfied clients.</p>
                                    </li>
                                    <li class="mb-3">
                                        <p>Violation Against Safety, Health and Use of Company Resources</p>
                                        <p>Company mechanisms and devices as well as policies ensure the safety and good
                                            health of all employees in the workplace.Violation of these policies,
                                            including misuse and nonuse of these mechanisms and devices, exposes risk
                                            and danger to anyone, if not everyone in the workplace.</p>
                                        <p>On the other hand, Company resources like equipment, furniture, supplies,
                                            tools and technology are solely for the use of the Company. Inappropriate,
                                            unauthorized or wrong utilization of these resources diminishes their
                                            utility and is financially disadvantageous to the Company.</p>
                                    </li>
                                    <li class="mb-3">
                                        <p>Gross Neglect of Duty</p>
                                        <p>Habitual neglect of duty refers to the commission of a combination of various
                                            categories of offenses which, when put together, shows a person to be one
                                            who continually and regularly fails to observe the diligence required of
                                            them as an employee. The nature of this offense entitles the Company to
                                            review past offenses and evaluate them collectively.</p>
                                        <p>Other acts which may be committed or other causes which may exist, although
                                            not falling squarely within the above categories or in the Table of
                                            Infractions, which are nevertheless related to or similar therewith, shall
                                            be dealt with in accordance with the Code.</p>
                                    </li>
                                </ol>
                                <hr class="my-5" />
                            </div>
                        </section>

                        

                        <!--  RESET PERIOD-->
                        <section id="reset-period" class="coc-section">
                            <h2 class="h3 mb-3 text-dark">Reset Period</h2>
                            <div class="coc-body text-dark">
                                <p class="lh-lg ps-3">
                                    In a continued effort to balance performance with employee motivation and as a sign
                                    of good faith, the management has decided to provide a reset period to the present
                                    Code of Conduct this allows our employees opportunities to relieve themselves of the
                                    burden and implications of these offenses as they pile up and result to an increased
                                    overall gravity score.
                                </p>
                                <p class="lh-lg ps-3">
                                    The reset period for each classification is as follows:
                                </p>

                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="fw-bold">Classification</th>
                                            <th scope="col" class="fw-bold">Reset Period</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Minor Offense</td>
                                            <td>3 months</td>
                                        </tr>
                                        <tr>
                                            <td>Less Grave Offense</td>
                                            <td>6 months</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <hr class="my-5" />
                            </div>
                        </section>

                        

                        <!--  PRESCRIPTION CLAUSE -->
                        <section id="prescription-clause" class="coc-section">
                            <h2 class="h3 mb-3 text-dark">Prescription Clause</h2>
                            <div class="coc-body text-dark">
                                <p class="lh-lg ps-3">
                                    The corrective action shall remain active for a prescribed period of time after the
                                    unacceptable behavior is committed. Regardless of the prescriptionclause, the
                                    records of offenses that are reset as prescribed continue to have an impact on the
                                    employee's general record.
                                </p>
                                <p class="lh-lg ps-3">
                                    The prescription clause of the Code of Conduct is provided as follows:
                                </p>
                                <ol>
                                    <li class="mb-3">
                                        All offenses committed on or before August 27, 2018 will prescribe on August 26,
                                        2019. This means that this could no longer be used as basis for gross neglect of
                                        duty in the monitoring of offenses leading to the accumulation of the gravity
                                        score.
                                    </li>
                                    <li class="mb-3">
                                        <p> Offenses committed August 27, 2018 onwards will prescribe based on the
                                            gravity of the offense (shown by its gravity score) as provided in the Code.
                                        </p>
                                        <p>The prescription period for each gravity classification is as follows:</p>
                                        <div class="card shadow-sm border-0 my-4">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered align-middle">
                                                        <thead class="table-light">
                                                            <tr>
                                                                <th scope="col" class="text-center align-middle">Nature
                                                                    of Offenses<br><span
                                                                        class="small text-muted">(Gravity Score)</span>
                                                                </th>
                                                                <th scope="col" class="text-center align-middle">
                                                                    Standard Penalty</th>
                                                                <th scope="col" class="text-center align-middle">
                                                                    Prescription Period</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="text-center">1</td>
                                                                <td class="text-center">Verbal Reprimand</td>
                                                                <td class="text-center">6 months</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-center">2</td>
                                                                <td class="text-center">Written Reprimand</td>
                                                                <td class="text-center">1 year</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-center">3</td>
                                                                <td class="text-center">2 to 5 days suspension</td>
                                                                <td class="text-center">1 ½ years</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-center">4</td>
                                                                <td class="text-center">5 to 10 days suspension</td>
                                                                <td class="text-center">2 years</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mb-3">
                                        When the gravity score of the offense is not equivalent to the penalty imposed
                                        upon the erring employee, the gravity score prevails over the sanction and as
                                        such, will be the basis for the prescription.
                                    </li>
                                    <li class="mb-3">
                                        Upon prescription of an offense, frequency or the gravity of subsequent offenses
                                        of the same nature will count from that offense after the one that prescribed.
                                    </li>
                                </ol>
                                <hr class="my-5" />
                            </div>
                        </section>

                        


                        <!--  REPEALING CLAUSE-->
                        <section id="repealing-clause" class="coc-section">
                            <h2 class="h3 mb-3 text-dark">Repealing Clause</h2>
                            <div class="coc-body text-dark">
                                <p class="lh-lg ps-3">
                                    Any existing policy, rule or procedure which is contrary to or inconsistent with the
                                    foregoing provisions is deemed modified or repealed accordingly upon effectivity of
                                    this Code.
                                </p>
                                <hr class="my-5" />
                            </div>
                        </section>

                        

                        <!--  SEPARABILITY CLAUSE-->
                        <section id="separability-clause" class="coc-section">
                            <h2 class="h3 mb-3 text-dark">Separability Clause</h2>
                            <div class="coc-body text-dark">
                                <p class="lh-lg ps-3 mb-3">
                                    If any provision of this Code is declared to be contrary to law, morals or public
                                    policy, only such provision shall be void.
                                </p>
                                <p class="lh-lg ps-3 mb-3">
                                    The rest shall remain in full force and effect, unless the same becomes inoperative
                                    or impractical if implemented without the particular provision(s) declared to be
                                    contrary to law, morals or public policy.
                                </p>
                                <hr class="my-5" />
                            </div>
                        </section>

                        

                        <!--  EFFECTIVITY CLAUSE-->
                        <section id="effectivity-clause" class="coc-section">
                            <h2 class="h3 mb-3 text-dark">Effectivity Clause</h2>
                            <div class="coc-body text-dark">
                                <p class="lh-lg ps-3">
                                    This Code of Conduct shall take effect on August 27, 2018
                                </p>

                                <div class="card shadow-sm border-0 my-5">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table align-middle coc-table">
                                                <thead>
                                                    <tr class="coc-head-group">
                                                        <th scope="col" rowspan="2">Specific Offense</th>
                                                        <th scope="col" rowspan="2">Brief Explanation (if any)</th>
                                                        <th scope="col" colspan="6" class="text-center">Corrective
                                                            Action with Corresponding Gravity Score</th>
                                                    </tr>
                                                    <tr class="coc-head-sub">
                                                        <th scope="col" class="action-col">Verbal Reprimand</th>
                                                        <th scope="col" class="action-col">Written Reprimand with
                                                            warning of suspension</th>
                                                        <th scope="col" class="action-col">Written Reprimand with
                                                            warning of termination</th>
                                                        <th scope="col" class="action-col">2–5 days suspension</th>
                                                        <th scope="col" class="action-col">5–10 days suspension to
                                                            termination</th>
                                                        <th scope="col" class="action-col">Termination</th>
                                                    </tr>
                                                    <tr class="coc-head-sub">
                                                        <th scope="col" colspan="2" class="text-center">Gravity Score
                                                        </th>
                                                        <th scope="col" class="text-center">1</th>
                                                        <th scope="col" class="text-center">2</th>
                                                        <th scope="col" class="text-center">3</th>
                                                        <th scope="col" class="text-center">3</th>
                                                        <th scope="col" class="text-center">4</th>
                                                        <th scope="col" class="text-center">5</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="major-section">
                                                        <td colspan="8">I. VIOLATION OF PERFORMANCE STANDARDS</td>
                                                    </tr>
                                                    <tr class="sub-section">
                                                        <td colspan="8">A. NON-ADHERENCE TO ATTENDANCE &amp; SCHEDULING
                                                            REQUIREMENTS</td>
                                                    </tr>
                                                    <tr>
                                                        <td>a. Excessive Breaks</td>
                                                        <td>Taking breaks more than the allowed time</td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">1st</span></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">2nd</span></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">3rd</span></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">4th</span></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">5th</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>b. Tardiness</td>
                                                        <td>Coming to work late</td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">1st</span></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">2nd</span></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">3rd</span></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">4th</span></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">5th</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>c. Unauthorized Undertime</td>
                                                        <td>Unauthorized or any unexcused undertime of more than one
                                                            hour in a shift</td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">1st</span></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">2nd</span></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">3rd</span></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">4th</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>d. AWOL(absent without leave)</td>
                                                        <td>Any absence without justifiable reason which is (a) not
                                                            supported by an approved leave application or (b) an
                                                            unauthorized extension of one’s previously approved Leave of
                                                            Absence. (c) Notification may be in the form of a text
                                                            message, phone call, fax or email message or other
                                                            acceptable means set forth by the team. Notification must be
                                                            done at least two hours prior to the start of the shift and
                                                            must be confirmed and approved by the immediate
                                                            supervisor/team leader.</td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">1st</span></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">2nd</span></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">3rd</span></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">4th</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>e. Consecutive Absences</td>
                                                        <td>Unauthorized or any unexcused absence for at least two (2)
                                                            but not more than three (3) consecutive days</td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">1st</span></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">2nd</span></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">3rd</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>f. Abandonment of Work</td>
                                                        <td>Unauthorized and unexcused absence or AWOL for four (4)
                                                            consecutive days or more</td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">1st</span></td>
                                                    </tr>

                                                    <tr class="sub-section">
                                                        <td colspan="8">B. OFFENSES RELATING TO WORK ETHICS AND
                                                            PROFESSIONALISM</td>
                                                    </tr>
                                                    <tr>
                                                        <td>a. Failure to log in/out</td>
                                                        <td>Two counts of failure to log within a pay period shall
                                                            constitute a single offense.</td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">1st</span></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">2nd</span></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">3rd</span></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">4th</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>b. Failure to Render Accountability</td>
                                                        <td>Failure to account for advanced company funds, accountable
                                                            forms, company-issued tools and equipment and similar items;
                                                            failure to render and submit regular reports or other
                                                            reports/information as may be required by the company.</td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">1st</span></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">2nd</span></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">3rd</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>c. Alteration of official documents</td>
                                                        <td>Unauthorized alteration or falsification of any company
                                                            record that includes giving of false or misleading
                                                            information about the Company, work, work processes and/or
                                                            one’s self.</td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">1st</span></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">2nd</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>d. Reporting to work under the influence of liquor/drugs
                                                        </td>
                                                        <td>Coming or reporting to work under the influence of liquor or
                                                            drugs, including drinking of alcoholic beverages during work
                                                            hours within the company premises except during
                                                            company-authorized occasions.</td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">1st</span></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">2nd</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>e. Lewd conduct</td>
                                                        <td>Indecent or immoral conduct within the Company premises
                                                            including, but not limited to, having sex,
                                                            exhibitionism/voyeurism, and browsing, distributing or
                                                            showing of pornographic materials.</td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">1st</span></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">2nd</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>f. Conflict of interest</td>
                                                        <td>Engaging, participating or involving oneself directly or
                                                            indirectly in any transaction, undertaking or enterprise
                                                            which is in conflict with or is undesirable or detrimental
                                                            to the interest of the Company</td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">1st</span></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">2nd</span></td>
                                                    <tr>
                                                        <td>g. Breach of Confidentiality</td>
                                                        <td>Unauthorized disclosure or use of classified information
                                                            including information generated for internal use of the
                                                            Company regardless of whether or not the same was
                                                            posted/published within the Company; engaging in any form of
                                                            intelligence collection using Company facilities.</td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">1st</span></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">2nd</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>h. Disclosure of confidential information</td>
                                                        <td>Disclosure of one’s contract agreement details between the
                                                            employee and the company, such as salary, commissions,
                                                            allowances and benefits.</td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">1st</span></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">2nd</span></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">3rd</span></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">4th</span></td>
                                                        <td class="action-col"></td>
                                                    </tr>

                                                    <tr class="sub-section">
                                                        <td colspan="8">C. OFFENSES THAT AFFECT QUALITY OF WORK</td>
                                                    </tr>
                                                    <tr>
                                                        <td>a. Unsatisfactory Work Performance</td>
                                                        <td>Failure of an employee to provide the required diligence and
                                                            due care in the performance of his work. An employee’s work
                                                            assignment consists of that which is explicitly given to him
                                                            by the manager/team leader of his department and other job
                                                            assignment that will be given to him/her from time to time.
                                                        </td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">1st</span></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">2nd</span></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">3rd</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>b. Discourtesy to client</td>
                                                        <td>Swearing or blurting out profanities towards the client,
                                                            making fun of the client, hanging up on them and other
                                                            similar acts.</td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">1st</span></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">2nd</span></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">3rd</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>c. Falsification</td>
                                                        <td>Mutilating or adding false entries on EOD reports,
                                                            documenting answers contrary to or different from what the
                                                            client gave, fabricating conversations, willful perversion
                                                            of facts, making fraudulent transactions and other similar
                                                            acts.</td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">1st</span></td>
                                                    </tr>


                                                    <tr class="sub-section">
                                                        <td colspan="8">D. DISRUPTION OF WORK</td>
                                                    </tr>
                                                    <tr>
                                                        <td>a. Sleeping while on duty</td>
                                                        <td>Sleeping during work hours in any area within company
                                                            premises</td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">1st</span></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">2nd</span></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">3rd</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>b. Unauthorized/inappropriate activities during work hours
                                                        </td>
                                                        <td>Abuse of company time for example, unauthorized time away
                                                            from the work area, use of company time for personal
                                                            business, texting or receiving text messages during hours of
                                                            work, engaging in excessive visiting or long personal
                                                            conversations, or using the computer for personal use</td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">1st</span></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">2nd</span></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">3rd</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>c. Disruptive Behavior</td>
                                                        <td>Inappropriate shouting, boisterous laughter, abnormally
                                                            raising one’s voice, and similar acts</td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">1st</span></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">2nd</span></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">3rd</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>d. Failure to work overtime</td>
                                                        <td>Failure to work overtime without any valid reason after
                                                            signifying willingness and being authorized/instructed to do
                                                            so.</td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">1st</span></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">2nd</span></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">3rd</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>e. Refusal to accept work</td>
                                                        <td>Refusal to accept work, change of shift or work location
                                                            assigned by a supervisor/team leader or management.</td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">1st</span></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">2nd</span></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">3rd</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>f. Work slowdown</td>
                                                        <td>Participating in any kind of work slowdown or similar
                                                            concerted interference with company operations</td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">1st</span></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">2nd</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>g. Gambling</td>
                                                        <td>Gambling in any form, promoting or assisting gambling
                                                            operations, betting lottery or any game of chance contrary
                                                            to law, within company premises.</td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">1st</span></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">2nd</span></td>
                                                    </tr>

                                                    <tr class="major-section">
                                                        <td colspan="8">II. VIOLATION AGAINST PROFESSIONAL AND
                                                            INTERPERSONAL RELATIONSHIP</td>
                                                    </tr>
                                                    <tr>
                                                        <td>A. Disobedience/insubordination</td>
                                                        <td>Willful failure to follow a supervisor’s or the company’s
                                                            instructions. Willful refusal to obey or comply with
                                                            official and lawful orders, rules and instructions</td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">1st</span></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">2nd</span></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">3rd</span></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">4th</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>B. Discourtesy/disrespect to co-employees</td>
                                                        <td>Improper conduct and acts of gross discourtesy and/or
                                                            disrespect to co-employees, visitors and/guests at any time
                                                            within company premises</td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">1st</span></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">2nd</span></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">3rd</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>C. False information</td>
                                                        <td>Deliberately submitting false, misleading or grossly
                                                            inaccurate data/information about other employees</td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">1st</span></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">2nd</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>D. Threats/Offensive language</td>
                                                        <td>Using disrespectful, abusive, indecent or offensive
                                                            words/language to co-employees, visitors and/or guests of
                                                            the company</td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">1st</span></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">2nd</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>E. Intrigue/Defamation/Malicious Statements/False
                                                            Information</td>
                                                        <td>Making false, defamatory or malicious statements against a
                                                            co-employee or the company as a whole so as to dishonor,
                                                            discredit or contempt the said employee of the company;
                                                            deliberately submitting false, misleading or grossly
                                                            inaccurate data/information about other employees.</td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">1st</span></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">2nd</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>F. Commission of a crime</td>
                                                        <td>Commission and/or being found guilty of crime punishable
                                                            under existing laws</td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">1st</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>G. Assault/Inflicting Bodily Harm</td>
                                                        <td>Inflicting or attempting to inflict bodily harm to a
                                                            co-employee, whether inside or outside the company premises,
                                                            in relation to work</td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">1st</span></td>
                                                    </tr>

                                                    <tr class="major-section">
                                                        <td colspan="8">III. VIOLATION AGAINST APPROPRIATE USE OF
                                                            COMPANY PROPERTY, SAFETY AND HEALTH</td>
                                                    </tr>
                                                    <tr class="sub-section">
                                                        <td colspan="8">A. INAPPROPRIATE USE OF COMPANY PROPERTY</td>
                                                    </tr>
                                                    <tr>
                                                        <td>a. Smoking in undesignated places</td>
                                                        <td>Smoking in work areas, comfort rooms and other areas not
                                                            designated as a smoking area</td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">1st</span></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">2nd</span></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">3rd</span></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">4th</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>b. Littering</td>
                                                        <td> Acts creating or contributing to unsanitary conditions;
                                                            littering, which includes leaving leftovers or dirty dishes
                                                            unattended on a workstation and throwing cigarette butts
                                                            anywhere except in trash bins.</td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">1st</span></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">2nd</span></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">3rd</span></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">4th</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>c. Unauthorized entry/exit to offices</td>
                                                        <td>Unauthorized entry or exit from any restricted area, or
                                                            permitting or assisting any person to enter and/or have
                                                            access to restricted areas, cabinets, drawers, lockers,
                                                            files, computer files, etc.</td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">1st</span></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">2nd</span></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">3rd</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>d. Unauthorized use of company property</td>
                                                        <td>Unauthorized use, operation, possession or lending of
                                                            company property, equipment or materials for personal
                                                            use/purpose.</td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">1st</span></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">2nd</span></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">3rd</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>e. Willful damage to property</td>
                                                        <td>Deliberately damaging or attempting to damage company
                                                            property.</td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">1st</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>f. Failure to report damage</td>
                                                        <td>Failure of the employee to report any damage to company
                                                            property caused by the employee himself</td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">1st</span></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">2nd</span></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">3rd</span></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">4th</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>g. Theft</td>
                                                        <td>Theft or unauthorized removal or appropriation of company
                                                            records or property of co-employees, visitors and guests
                                                        </td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">1st</span></td>
                                                    </tr>

                                                    <tr class="sub-section">
                                                        <td colspan="8">B. OFFENSES RELATED TO SECURITY, SAFETY AND
                                                            HEALTH</td>
                                                    </tr>
                                                    <tr>
                                                        <td>a. Failure to comply with company health and security
                                                            requirements</td>
                                                        <td>Not wearing ID, failure to submit pre-employment documents,
                                                            annual medical exams and other similar offenses.</td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">1st</span></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">2nd</span></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">3rd</span></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">4th</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>b. Unauthorized use of ID & employee identification
                                                            documents</td>
                                                        <td>Lending or permitting the use of one’s company ID or
                                                            company-issued documents for the benefit of another</td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">1st</span></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">2nd</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>c. Endangering company safety</td>
                                                        <td>Committing acts which endanger the safety of oneself, others
                                                            or the property of the company</td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">1st</span></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">2nd</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>d. Working while harboring a contagious disease</td>
                                                        <td>Failure to notify the Administration and HR Department that
                                                            one is suffering from a contagious disease which may
                                                            endanger the health of other employees</td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">1st</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>e. Possession/use of illegal drugs</td>
                                                        <td>Possessing, using or causing others to use prohibited drugs
                                                            within company premises</td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">1st</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>f. Possession of deadly weapon/explosive</td>
                                                        <td>Unauthorized carrying or possession of deadly weapon(s)
                                                            and/or explosive(s) inside the company premises</td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">1st</span></td>
                                                    </tr>


                                                    <tr class="sub-section">
                                                        <td colspan="8">C. OFFENSES RELATING TO COMPANY IT FACILITIES
                                                            AND INTELLECTUAL PROPERTY</td>
                                                    </tr>

                                                    <tr>
                                                        <td>a. Forwarding of non-work related emails</td>
                                                        <td>Forwarding/transmitting/storing of personal emails</td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">1st</span></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">2nd</span></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">3rd</span></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">4th</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>b. Unauthorized internet use</td>
                                                        <td>Using company computer resources to access the internet for
                                                            personal purpose without approval from the user’s manager
                                                            and the IT department.</td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">1st</span></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">2nd</span></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">3rd</span></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">4th</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>c. Unauthorized downloading of programs</td>
                                                        <td>Unauthorized downloading of any shareware programs or files
                                                            for use without prior authorization from the user’s manager
                                                            and the IT Department</td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">1st</span></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">2nd</span></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">3rd</span></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">4th</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>d. Unauthorized use of data storage facility</td>
                                                        <td>Acquisition, storage and dissemination of data which is
                                                            illegal, pornographic or which negatively depicts race, sex
                                                            or creed</td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">1st</span></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">2nd</span></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">3rd</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>e. Breach of assigned password</td>
                                                        <td>Allowing others to use one’s username and/or password</td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">1st</span></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">2nd</span></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">3rd</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>f. Unauthorized access of files, data and information</td>
                                                        <td>Unauthorized access to information that is not needed for
                                                            proper execution of job functions, making unauthorized
                                                            changes to information contained therein, unauthorized
                                                            pointing/hyperlinking of company web sites or intracompany
                                                            sites to internet/VBN sites</td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">1st</span></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">2nd</span></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">3rd</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>g. Unauthorized use of intellectual property</td>
                                                        <td>Use, transmission, duplication or voluntary receipt of
                                                            material that infringes on the copyrights, trademarks, trade
                                                            secrets or patent rights of any person or organization. It
                                                            is assumed that all materials on the internet are
                                                            copyrighted or patented unless specific notices state
                                                            otherwise.</td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">1st</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>h. Abuse of usage of company IT and the internet</td>
                                                        <td>Creating, posting, transmitting or voluntarily receiving any
                                                            unlawful, offensive, libelous, threatening, harassing
                                                            material including but not limited to comments based on
                                                            race, national origin, sex, sexual orientation, age,
                                                            disability, religion or political beliefs, using current
                                                            company software or the internet.</td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">1st</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>i. Use of company IT facility to perform illegal acts</td>
                                                        <td>Use of the company email or electronic messaging system to
                                                            infringe the copyright or other intellectual property rights
                                                            of third parties to distribute defamatory, fraudulent or
                                                            harassing messages, or otherwise to engage in any illegal or
                                                            wrongful conduct.</td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">1st</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>j. Commission of a crime (local or global) related to
                                                            information technology</td>
                                                        <td>Any conduct that constitutes or encourages the commission of
                                                            a criminal offense, leads to civil liability or otherwise
                                                            violates any regulation, local, national or international
                                                            law including but not limited to US export control laws and
                                                            regulations.</td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">1st</span></td>
                                                    </tr>

													  <hr class="my-5" />
													  

                                                    <tr class="major-section">
                                                        <td colspan="8">IV. GROSS NEGLECT OF DUTY</td>
                                                    </tr>
                                                    <tr>
                                                        <td>GROSS NEGLECT OF DUTY</td>
                                                        <td>Commission of offenses, whether or not falling within the
                                                            same category and regardless of the timeframe within which
                                                            the first and the last offenses were committed, which, when
                                                            the gravity score for each offense is cumulated and lumped
                                                            together, resulting to a total gravity score of equal to or
                                                            not more than fifteen (15)</td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"></td>
                                                        <td class="action-col"><span
                                                                class="badge bg-light text-dark border">1st</span></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                             <hr class="my-5" />
                            </div>
                        </section>




                        <!-- Acknowledgement -->
                        <section id="acknowledgement" class="coc-section">
                            <h2 class="h3 mb-3 text-dark">Acknowledgement</h2>
                            <div class="coc-body text-dark">
                                <p>
                                    By acknowledging this Code of Conduct, you confirm that you have read, understood,
                                    and
                                    agree to comply with all policies and standards outlined in this document. Your
                                    acknowledgement serves as a commitment to uphold these principles in your daily work
                                    and
                                    interactions.
                                </p>

                                <?php if (!$isSubmitted): ?>
                                <div class="alert alert-primary coc-ack" role="alert">
                                    <form method="post" class="m-0">
                                        <div class="d-flex gap-3 align-items-start">
                                            <input class="form-check-input mt-1 coc-check" type="checkbox"
                                                id="coc_acknowledge" name="coc_acknowledge" value="1" required />
                                            <label class="form-check-label text-dark" for="coc_acknowledge">
                                                I acknowledge that I have read and understood the Code of Conduct. I
                                                agree to
                                                comply with all policies and standards outlined in this document and
                                                understand
                                                that violations may result in disciplinary action.
                                            </label>
                                        </div>

                                        <div class="d-flex flex-wrap gap-2 mt-3">
                                            <button type="submit" class="btn btn-primary coc-submit">Agree &amp;
                                                Submit</button>
                                            <a href="#" class="btn btn-outline-secondary" role="button">Download
                                                Copy</a>
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
                                                Your acknowledgement has been recorded. Thank you for your commitment to
                                                our
                                                Code of Conduct.
                                            </div>
                                            <a href="#" class="btn btn-outline-success mt-3" role="button">Download
                                                Copy</a>
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