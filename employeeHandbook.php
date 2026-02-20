<?php
$pageTitle = 'Task House';
$activeNav = 'employeeHandbook';

$sections = [
    ['id' => 'the-company', 'title' => 'The Company'],
    ['id' => 'recruit-select', 'title' => 'Recruitment and Selection'],
    ['id' => 'compenben', 'title' => 'Compensation and Benefits Package'],

    ['id' => 'policies', 'title' => 'Policies'],
    ['id' => 'performance-eval', 'title' => 'Performance Evaluation'],
    ['id' => 'types-term', 'title' => 'Types of Termination of Employee Contract'],
    ['id' => 'types-term2', 'title' => 'Types of Termination of Employee Contract'],
    ['id' => 'data-privacy', 'title' => 'Data Privacy Content'],
    ['id' => 'intellectual-property', 'title' => 'Intellectual Property Rights'],
    ['id' => 'use-facilities', 'title' => 'Use of Facilities and Resources'],
    ['id' => 'outside-employment', 'title' => 'Outside Employment'],

    ['id' => 'non-compete', 'title' => 'Employee Non-Compete Clause'],
    ['id' => 'non-solicitation', 'title' => 'Non-Solicitation and Non-Poaching of Clients Clause'],
    ['id' => 'confidentiality-agreement', 'title' => 'Confidentiality Agreement'],
    ['id' => 'rules-conduct', 'title' => 'Rules of Conduct'],
    ['id' => 'acknowledgement', 'title' => 'Acknowledgement'],
];

$isSubmitted = ($_SERVER['REQUEST_METHOD'] ?? '') === 'POST' && !empty($_POST['ehb_acknowledge']);

require __DIR__ . '/includes/header.php';
?>

<?php require __DIR__ . '/includes/sidebar.php'; ?>

<main class="app-main">
    <?php require __DIR__ . '/includes/app-header.php'; ?>

    <div class="container-fluid px-3 px-md-4 py-3 ehb-page">
        <div class="row g-4">
            <!-- Mobile section dropdown -->
            <div class="col-12 d-lg-none">
                <button type="button"
                    class="btn ehb-mobile-toggle w-100 d-flex align-items-center justify-content-between"
                    data-bs-toggle="collapse" data-bs-target="#ehbMobileNav" aria-expanded="false"
                    aria-controls="ehbMobileNav">
                    <span class="ehb-mobile-label">Navigate Sections</span>
                    <i class="bi bi-chevron-down ehb-mobile-caret" aria-hidden="true"></i>
                </button>

                <div class="collapse mt-2" id="ehbMobileNav">
                    <div class="card ehb-nav-card">
                        <div class="list-group list-group-flush">
                            <?php foreach ($sections as $section): ?>
                            <a class="list-group-item list-group-item-action ehb-mobile-item"
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
                <div class="position-sticky ehb-sticky">
                    <div class="card ehb-nav-card">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center gap-2 pb-3 mb-3 ehb-nav-head">
                                <i class="bi bi-file-earmark-text ehb-nav-ico" aria-hidden="true"></i>
                                <h3 class="m-0 ehb-nav-title">Contents</h3>
                            </div>
                            <nav id="ehbNav" class="nav nav-pills flex-column ehb-nav"
                                aria-label="Code of Conduct contents">
                                <?php foreach ($sections as $section): ?>
                                <a class="nav-link ehb-nav-link"
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
                <div class="card ehb-paper border-0 shadow-sm">
                    <!-- Header -->
                    <div class="ehb-paper-head px-3 px-md-4 py-4">
                        <div
                            class="d-flex flex-column flex-sm-row align-items-start justify-content-between gap-3">
                            <div class="flex-grow-1">
                                <h1 class="h2 h1-md mb-2 text-dark">Employee Handbook</h1>
                                <p class="mb-2 text-secondary ehb-subtitle">XIGNEX DIGITAL SOLUTIONS INC
                                    VIRTUAL BIZNEST</p>
                                <div class="small text-muted">Last Updated: February 2026</div>
                            </div>

                            <a href="#"
                                class="btn btn-outline-secondary d-inline-flex align-items-center gap-2 ehb-download"
                                role="button">
                                <i class="bi bi-download" aria-hidden="true"></i>
                                <span class="d-none d-sm-inline">Download PDF</span>
                            </a>
                        </div>
                    </div>

                    <!-- Content-->
                    <div class="ehb-content px-3 px-md-4 py-4" data-bs-spy="scroll" data-bs-target="#ehbNav"
                        data-bs-smooth-scroll="true" tabindex="0">
                        <!-- THE COMPANY -->
                        <section id="the-company" class="ehb-section">
                            <h2 class="h3 mb-3 text-dark">A. THE COMPANY</h2>
                            <div class="ehb-body text-dark">
                                <p><strong>
                                        A.1. Company Profile: Who We Are and What We Do
                                    </strong>

                                </p>
                                <p>
                                    We are a breed of industry-honed Virtual Assistants with wide ranges of
                                    experience in our respective domains or niches, capable of remotely
                                    executing a host of unparalleled services on various facets and levels of
                                    business.
                                </p>
                                <p>
                                    We build trust with the clients whom we treat as our business partners. We
                                    operate on the fact that everyone is looking for the best virtual
                                    assistant services provider to help them cut overhead costs while
                                    achieving results. We are committed to making our client’s business our
                                    business.
                                </p>

                                <p><strong>
                                        A.2. Mission and Vision
                                    </strong></p>
                                <p><strong>
                                        Mission
                                    </strong></p>
                                <p>
                                    Taking on key operational tasks strategically for success-driven
                                    entrepreneurs, to give them significant advantage in fulfilling their
                                    goals and impact on their community.
                                </p>
                                <p><strong>
                                        Vision
                                    </strong>
                                </p>
                                <p>
                                    To be reputable in fostering the vision of success-driven businesses
                                    through the use of internet technology, skilled professionals and
                                    outstanding business relationship.
                                </p>
                                <p><strong>
                                        A.3. Values
                                    </strong>
                                </p>

                                <p>
                                    <strong>Commitment - </strong>
                                    We are committed to the company’s goal of fulfilling every client’s
                                    vision. Being committed to something bigger than the individual means
                                    every person acts in ways that are beyond personal gain or concerns. We
                                    assist and support our teammates because we can accomplish more by working
                                    together as a group.
                                </p>
                                <p>
                                    <strong>Order - </strong>
                                    We continuously strive for order in the way we design our processes,
                                    handle our client’s businesses and behave toward each other. Everyone is
                                    required to uphold the highest standards in ethical and professional
                                    practices.
                                </p>
                                <p>
                                    <strong>Respect - </strong>
                                    We respect the laws, the government, the people we work with, our clients,
                                    the company and ourselves. Being reliable is evidence of respect.
                                </p>
                                <p>
                                    <strong>Excellence - </strong>
                                    We achieve excellence by constant progress not perfection. It is a way of
                                    life. We learn from our mistakes and actively seek knowledge. We commit
                                    ourselves to lifelong learning and continuous professional development. We
                                    manage tough situations with courage and candor.
                                </p>
                                <hr class="my-5" />
                            </div>

                        </section>




                        <!-- RECRUITMENT AND SELECTION -->
                        <section id="recruit-select" class="ehb-section">
                            <h2 class="h3 mb-3 text-dark">B. RECRUITMENT AND SELECTION</h2>
                            <div class="ehb-body text-dark">
                                <p>
                                    B.1. Xignex Digital Solutions Inc. is committed to employing the
                                    best-qualified candidates while engaging in recruitment and selection
                                    practices that comply with all applicable employment laws. The policy of
                                    Xignex Digital Solutions Inc. is to provide equal employment opportunities
                                    to all applicants and employees.


                                </p>
                                <p>
                                    B.2. Authorization from the CEO, Finance and Administrative Manager, and
                                    Operations Manager (Hiring Managers) is required to initiate any action
                                    for an open position, including recruitment expenditures, advertising,
                                    interviewing, and offers of employment.
                                </p>
                                <ol class="lh-lg ps-3">
                                    <li class="mb-3">
                                        The hiring manager submits a completed requisition to the Human
                                        Resources.
                                    </li>
                                    <li class="mb-3">
                                        Human Resources will meet with the hiring manager to discuss the
                                        position and determine the most effective recruitment and selection
                                        process.
                                    </li>
                                    <li class="mb-3">Recruitment sources will include some or all of the
                                        following
                                        <ul>
                                            <li>Virtual BizNest website.</li>
                                            <li>Internal posting.</li>
                                            <li>Online job boards.</li>
                                            <li>Social media sites (Facebook and LinkedIn)</li>
                                            <li>Employee referrals.</li>
                                        </ul>
                                    </li>
                                    <li class="mb-3">Human Resources and hiring managers will review resumes
                                        of qualified candidates to identify the most appropriate candidates
                                        for interviewing.</li>
                                    <li class="mb-3">Human Resources will conduct telephone/video call
                                        pre-screens of identified candidates and schedule in-person interviews
                                        with the hiring manager.</li>
                                    <li class="mb-3">Hiring managers are responsible for conducting qualified
                                        candidates' interviews in a timely and effective manner. Human
                                        Resources is available to provide hiring managers with advice on
                                        interview techniques and final candidate selection.
                                        <p class="lh-lg ps-5 mt-4 mb-4">
                                            *In-person interviews are presently abated due to the ongoing risk
                                            of the pandemic.
                                        </p>
                                    </li>
                                    <li class="mb-3">Upon the selection of the final candidate, the hiring
                                        manager and Human Resources will collaborate to develop an appropriate
                                        offer of employment (including position title, compensation, etc.).
                                    </li>
                                    <li class="mb-4">The HR department will conduct reference checks and
                                        background checks on the selected final candidate.</li>
                                </ol>

                                <p class="mb-4"><strong>
                                        B.3 ONBOARDING
                                    </strong>
                                </p>
                                <p class="lh-lg ps-3 mb-3"><strong>
                                        B.3.1 Job Offer
                                    </strong>
                                </p>
                                <p class="lh-lg ps-3 mb-3">
                                    HR will inform successful candidates of their appointment through the Job
                                    Offer
                                    Letter. This letter details the position's specifics: position title,
                                    employment status,
                                    compensation, allowances, and benefits. Along with the Job Offer Letter,
                                    HR will
                                    also list pre-employment requirements for the successful hire to complete
                                    before
                                    his official start date.
                                </p>
                                <p class="lh-lg ps-3 mb-3">
                                    A Welcome Email will be sent to the new hire’s work email address.
                                </p>

                                <p class="lh-lg ps-3 mb-3"><strong>
                                        B.3.2 Login Credentials
                                    </strong>
                                </p>
                                <p class="lh-lg ps-3 mb-3">
                                    HR will provide login credentials for Google Workspace and Task House on
                                    the
                                    new hire’s first
                                </p>

                                <p class="lh-lg ps-3 mb-3"><strong>
                                        B.3.3 Appointment Papers
                                    </strong>
                                </p>
                                <p class="lh-lg ps-3 mb-3">
                                    Upon completion of the requirements being asked of him/her, the new hire
                                    will
                                    sign a Contract of Probationary Employment. This contract details the
                                    specifics of
                                    the position: start date, position title, the status of employment,
                                    compensation,
                                    allowances (if applicable), and benefits.
                                </p>
                                <p class="lh-lg ps-3 mb-3"><strong>
                                        B.3.4 New Employee Orientation
                                    </strong>
                                </p>
                                <p class="lh-lg ps-3 mb-3">
                                    The new hire will go through a New Employee Orientation on his/her start
                                    date.
                                    The New Employee Orientation will enable the new hire to learn all about
                                    the
                                    company and its policies and procedures, code of conduct and his job
                                    responsibilities.
                                </p>
                                <p class="lh-lg ps-3 mb-3"><strong>
                                        B.3.5 Confidentiality
                                    </strong>
                                </p>
                                <p class="lh-lg ps-3 mb-4">
                                    All application documents (resumes, interview results, transcripts, etc.)
                                    are
                                    considered confidential and are kept in the Human Resource Department's
                                    custody and care. Managers and supervisors who intend to view such
                                    documents must make a formal request to Human Resources.
                                </p>

                                <p>
                                    <strong>B.4 EMPLOYMENT STATUS</strong>
                                </p>
                                <p class="ps-3 mb-3">
                                    <strong>B.4.1 TYPES OF EMPLOYEES </strong>
                                </p>

                                <p class="ps-4 mb-3">
                                    A. Probationary Employee - a newly hired employee working under a
                                    probationary
                                    period not exceeding six (6) months from the date the employee started
                                    working
                                    unless covered by an apprenticeship agreement stipulating a more extended
                                    period:
                                </p>


                                <p class="ps-5 mb-3">
                                    A.1. The employee will be on probationary status for 180 days from the
                                    start of
                                    employment.
                                </p>
                                <p class="ps-5 mb-3">
                                    A.2. During this period, the Company will evaluate your performance in
                                    terms of
                                    your business scorecard, behavioral competencies and job description as
                                    provided for in Job Description.
                                </p>
                                <p class="ps-5 mb-3">
                                    A.3. The Company can terminate the employment during this period for any
                                    just
                                    or authorized cause, or if the employee fails to meet reasonable standards
                                    of
                                    satisfactory performance, or failure to comply with the pre-employment
                                    requirements (clearances, medical, etc.) or to pass the onboarding/
                                    training
                                    program required for your position.
                                </p>
                                <p class="ps-5 mb-3">
                                    A.4. The probationary employee is appointed as a regular employee of the
                                    Company if they pass the onboarding/ training program required for the
                                    position. Upon favorable evaluation, on or before the end of the
                                    probationary
                                    period, the employment status will be converted to regular.
                                </p>

                                <p class="ps-4 mb-3">
                                    Regular Employee –an employee who is appointed to a permanent position
                                    after
                                    satisfactorily completing his or her probationary period of employment
                                </p>

                                <p class="ps-3 mb-3">
                                    <strong>B.4.2. EMPLOYEE RECORDS</strong>
                                </p>

                                <p class="ps-5 mb-3">
                                    Regular Employee –an employee who is appointed to a permanent position
                                    after
                                    satisfactorily completing his or her probationary period of employment All
                                    employees are required to update their data, which are kept and
                                    maintained by Human Resources. Any changes in residence, civil status,
                                    educational attainment, dependents/beneficiaries, or other personal
                                    circumstances must be reported promptly to HR so that such changes
                                    can be recorded in the 201 files. Employee records are kept confidential,
                                    and only authorized company officers have access to them.
                                </p>
                                <hr class="my-5" />
                            </div>

                        </section>



                        <!-- COMPENSATION AND BENEFITS PACKAGE  -->
                        <section id="compenben" class="ehb-section">
                            <h2 class="h3 mb-4 text-dark">C. COMPENSATION AND BENEFITS PACKAGE</h2>
                            <div class="ehb-body text-dark">

                                <p class="ps-5 mb-4">
                                    Xignex Digital Solutions Inc. provides a competitive and
                                    equitable compensation and benefits package that motivates
                                    employees to work at their peak performance and improve
                                    morale in relation to their contribution to the attainment of
                                    corporate objectives.
                                </p>

                                <p class="ps-3 mb-3">
                                    <strong>
                                        C.1 BASIC PAY
                                    </strong>
                                </p>
                                <p class="ps-4 mb-3">
                                    <strong>
                                        C.1.2 Monthly-Paid Employee
                                    </strong>
                                </p>
                                <p class="ps-4 mb-3">
                                    Monthly-paid employees are those who are paid every day of the
                                    month, including unworked rest days, special days, and regular
                                    holidays. Factor 365 days in a year is used in determining the equivalent
                                    monthly salary of monthly-paid employees.
                                </p>
                                <p class="ps-5 mb-3">
                                    <strong>
                                        Computation of the Estimated Equivalent Monthly
                                        Rate (EEMR) of Monthly-Paid
                                    </strong>
                                </p>
                                <p class="ps-4 mb-3">
                                    Factor 365 days in a year is used in determining the equivalent annual
                                    and monthly salary of monthly-paid employees. To compute their
                                    Estimated Equivalent Monthly Rate (EEMR), the procedure is as follows:
                                </p>

                                <div class="container my-4 mx-3">
                                    <div class="row">
                                        <div class="col-12">

                                            <!-- Formula -->
                                            <p class="fs-5">
                                                <u>Applicable Daily Rate (ADR)</u> x 365 = EEMR<br>
                                                12 months
                                            </p>

                                            <!-- Breakdown Section -->
                                            <p class="mt-4">
                                                Where 365 days/year =
                                            </p>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="d-flex justify-content-between">
                                                        <span>297</span>
                                                        <span>Ordinary working days</span>
                                                    </div>
                                                    <div class="d-flex justify-content-between">
                                                        <span>52</span>
                                                        <span>Rest days</span>
                                                    </div>
                                                    <div class="d-flex justify-content-between">
                                                        <span>12</span>
                                                        <span>Regular holidays</span>
                                                    </div>
                                                    <div class="d-flex justify-content-between">
                                                        <span>4</span>
                                                        <span>Special days</span>
                                                    </div>
                                                    <hr class="my-2">
                                                    <div class="d-flex justify-content-between fw-bold">
                                                        <span>365</span>
                                                        <span>Total equivalent no. of days/year</span>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>


                                <p class="ps-4 mb-4">
                                    The COMPANY may, at its discretion, grant bonuses, allowances, or
                                    benefits not defined in this contract. Such exercise of discretion shall
                                    not
                                    be considered as established practice or precedent and shall not be
                                    demandable under the Employment Contract or any other written or
                                    unwritten agreement.
                                </p>


                                <p class="ps-4 mb-3">
                                    <strong>
                                        C.1.3. SALARY SCHEDULE
                                    </strong>
                                </p>

                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="fw-bold">PAY DATE</th>
                                            <th scope="col" class="fw-bold">2PAYRUN COVERAGE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>10th of the month</td>
                                            <td>25th of the month</td>
                                        </tr>
                                        <tr>
                                            <td>16th to 30th of the previous month </td>
                                            <td>1st to 15th of the current month </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <p class="ps-4 mb-4">
                                    The employee's salary will be deposited into his or her payroll account.
                                </p>

                                <p class="ps-3 mb-3">
                                    <strong>
                                        C.2 MANDATORY BENEFITS
                                    </strong>
                                </p>

                                <p class="ps-4 mb-3">
                                    Mandatory Benefits as provided under the Labor Code and special laws
                                    shall be provided by the COMPANY if and when you are entitled to the
                                    same under the existing substantive/legal requirements. These benefits
                                    include, but not limited to:
                                </p>

                                <p class="ps-4 mb-3">
                                    <strong>
                                        C.2.1. AMOUNT OF 13TH MONTH PAY
                                    </strong>
                                </p>
                                <p class="ps-4 mb-3">
                                    Employees are entitled to 13th-month pay regardless of position,
                                    designation, or employment status, and irrespective of the method by
                                    which their wages are paid, provided that they have worked for at least
                                    one (1) month during the calendar year, to be released not later than
                                    December 24 which will be prorated to the number of months tenured in
                                    a year.
                                </p>
                                <p class="ps-4 mb-3">
                                    The minimum 13th month pay required by law should not be less than
                                    one-twelfth of the of the total basic salary earned by the within a
                                    calendar year.
                                </p>

                                <p class="ps-4 mb-3">
                                    <strong>
                                        C.2.2. SSS, PHILHEALTH and PAG IBIG
                                    </strong>
                                    - contributions will be deducted on
                                    a bi-monthly basis. The first half of the government-mandated
                                    contributions will be deducted on the 10th of the month and the second
                                    half on the 25th.
                                </p>
                                <p class="ps-4 mb-3">
                                    <strong>
                                        C.2.3. NIGHT SHIFT DIFFERENTIAL
                                    </strong>
                                    - This is a premium for working
                                    between 10:00 P.M to 6:00 A.M in a given day.
                                </p>
                                <p class="ps-4 mb-3">
                                    <strong>
                                        C.2.4. OVERTIME PAY
                                    </strong>
                                    - This is a premium given for rendering service
                                    beyond the 8 (eight) hour working period in a day, provided that the
                                    supervisor, manager or employer(s) had given prior written approval to
                                    perform the aforementioned overtime work. In the absence of such
                                    written approval, the employee is not entitled to said overtime pay.
                                </p>
                                <p class="ps-4 mb-3">
                                    <strong>
                                        C.2.5. REGULAR HOLIDAY PAY
                                    </strong>
                                    - This is a premium given during regular
                                    holidays regardless if you work on said regular holidays provided the
                                    employee is not absent on the working day before the regular holiday.
                                    However, they are not entitled to this benefit if the regular holiday
                                    falls
                                    during your paid leave of absence.
                                </p>
                                <p class="ps-4 mb-3">
                                    <strong>
                                        C.2.6. SPECIAL HOLIDAY
                                    </strong>
                                    - This is a premium given for working
                                    on Special Non-Working Holidays.
                                </p>
                                <p class="ps-4 mb-3">
                                    <strong>
                                        C.2.7. MATERNITY LEAVE or Expanded Maternity Leave under R.A. No.
                                        11210
                                    </strong>
                                    - This benefit applies to all female employees, regardless of civil
                                    status, employment status, and legitimacy of her child. A female
                                    employee can avail <strong>maternity leave</strong> not more than
                                    forty-five (45) days
                                    before her delivery date for prenatal care purposes. <strong>The eligible
                                        female
                                        worker should avail of maternity leave benefits</strong>either before
                                    or after
                                    the actual period of delivery in a continuous and uninterrupted manner
                                </p>
                                <p class="ps-4 mb-3">
                                    <strong>
                                        C.2.8. PATERNITY LEAVE or Paternity Leave Act of 1996, R.A. No. 8187
                                    </strong>
                                    - This benefit is granted to a married male employee, allowing him to not
                                    report to work for seven (7) days while continuing to earn
                                    compensation, on the condition that his wife has given birth or suffered
                                    a miscarriage, allowing him to effectively lend support to his wife during
                                    her recovery and/or nursing of the newly-born child.
                                </p>
                                <p class="ps-4 mb-3">
                                    <strong>
                                        C.2.9. SOLO PARENT LEAVE (R.A. No. 8972)
                                    </strong>
                                    - Employees left alone with
                                    the responsibility of parenthood are entitled to Solo Parent leave
                                    benefits as mandated by Republic Act No. 8972, otherwise known as the
                                    “Solo Parent’s Welfare Act of 2000”. The benefit applies to all solo
                                    parents under any of the following categories and consists of seven (7)
                                    working days of leave credits with full pay.
                                <ol class="mx-5">
                                    <li class="mb-3">A woman who gives birth as a result of rape and other
                                        crimes against chastity even without a final conviction of the
                                        offender: Provided, That the mother keeps and raises the
                                        child;</li>
                                    <li class="mb-3">Parent left solo or alone with the responsibility of
                                        parenthood due to death of spouse; </li>
                                    <li class="mb-3"> Parent left solo or alone with the responsibility of
                                        parenthood while the spouse is detained or is serving
                                        sentence for a criminal conviction for at least one (1) year;
                                    </li>
                                    <li class="mb-3">Parent left solo or alone with the responsibility of
                                        parenthood due to physical and/or mental incapacity of
                                        spouse as certified by a public medical practitioner;
                                    </li>
                                    <li class="mb-3">Parent left solo or alone with the responsibility of
                                        parenthood due to legal separation or de facto separation
                                        from spouse for at least one (1) year, as long as they are
                                        entrusted with the custody of the children;
                                    </li>
                                    <li class="mb-3">
                                        Parent left solo or alone with the responsibility of
                                        parenthood due to declaration of nullity or annulment of
                                        marriage as decreed by a court or by a church as long as
                                        they are entrusted with the custody of the children;
                                    </li>
                                    <li class="mb-3">
                                        Parent left solo or alone with the responsibility of
                                        parenthood due to abandonment of spouse for at least one
                                        (1) year;
                                    </li>
                                    <li class="mb-3">
                                        Unmarried mother/father who has preferred to keep and
                                        rear her/his child/children instead of having others care for
                                        them or give them up to a welfare institution;
                                    </li>
                                    <li class="mb-3">
                                        Any other person who solely provides parental care and
                                        support to a child or children;
                                    </li>
                                    <li class="mb-3">
                                        Any family member who assumes the responsibility of
                                        head of family as a result of the death, abandonment,
                                        disappearance or prolonged absence of the parents or solo
                                        parent.
                                    </li>
                                </ol>
                                </p>

                                <p class="ps-4 mb-3">
                                    <strong>
                                        C.2.10. LEAVE FOR VICTIMS OF VIOLENCE AGAINST WOMEN AND THEIR
                                        CHILDREN (VAWC)(R.A. No. 9262)
                                    </strong>
                                    - Women employees who are victims
                                    as defined in Republic Act No. 9262, otherwise known as the Anti
                                    Violence Against Women and Their Children Law, are entitled to a leave
                                    of up to ten (10) days with full pay. The said leave shall be extended
                                    when the need arises, as specified in the protection order issued by the
                                    barangay or the court. The leave benefit shall cover the days that the
                                    woman employee must attend to medical and legal concerns.
                                </p>
                                <p class="ps-4 mb-4">
                                    <strong>
                                        C.2.11. SPECIAL LEAVE FOR WOMEN (R.A. No. 9710)
                                    </strong>
                                    - Women employees
                                    regardless of age and civil status shall be entitled to a special leave
                                    benefit of two (2) months wherein she has undergone surgery due to
                                    gynecological disorders.
                                </p>

                                <p class="ps-3 mb-3">
                                    <strong>
                                        C.3 COMPANY BENEFITS
                                    </strong>
                                </p>
                                <p class="ps-4 mb-3">
                                    The Company aims to provide work-life balance, and maintain high
                                    standard mental, emotional and physical conditioning of the
                                    employees to ensure optimum performance of their functions.
                                </p>
                                <p class="ps-4 mb-3">
                                    <strong>C.3.1. VACATION LEAVE </strong>
                                    - All regular employees are entitled to avail
                                    seven (7) days Vacation Leave accrual of 0.6 per month. Newly
                                    regularized employees are entitled to the monthly earned leaves after
                                    regularization.
                                </p>
                                <p class="ps-4 mb-3">
                                    <strong>C.3.2. SICK LEAVE </strong>
                                    -- All regular employees are also eligible for five (5)
                                    days Sick Leave every year, accrual of 0.4 per month, earned after
                                    regularization. Unused sick leave shall be compensated with cash
                                    equivalent at the end of the calendar year.
                                </p>
                                <p class="ps-4 mb-3">
                                    <strong>C.3.3. EMERGENCY LEAVE </strong>
                                    - Employees may take Emergency Leave and
                                    take time off work immediately due to unforeseen circumstances up to
                                    two (2) days provided that a notification has been sent to his
                                    immediate Supervisor.
                                </p>
                                <p class="ps-4 mb-3">
                                    <strong>C.3.4. BEREAVEMENT LEAVE </strong>
                                    - A grieving employee may, at his disposal,
                                    use his/her remaining Vacation Leave to mourn the death of an
                                    immediate family member. Immediate Family Member refers to an
                                    employee’s parent, spouse, child, or sibling.
                                </p>
                                <p class="ps-4 mb-3">
                                    <strong>C.3.5. HEALTH INSURANCE </strong>
                                    - All regular employees are entitled to avail
                                    health insurance after having rendered (1) year of continuous service
                                    with the Company.
                                </p>
                                <p class="ps-4 mb-4">
                                    The benefit will take effect on the employee’s first year of employment.
                                </p>
                                <hr class="my-5" />
                            </div>

                        </section>



                        <!-- POLICIES  -->
                        <section id="policies" class="ehb-section">
                            <h2 class="h3 mb-4 text-dark">D. POLICIES</h2>
                            <div class="ehb-body text-dark">

                                <p class="ps-3 mb-3">
                                    <strong>
                                        D.1. POLICY ON HOURS OF WORK, PUNCTUALITY, AND ATTENDANCE
                                    </strong>

                                <p class="ps-4 mb-3">
                                    D.1.1. Normal working hours shall be eight (8) hours a day or forty (40)
                                    hours a week. You are entitled to one (1) hour meal break and is not
                                    included in the calculation of the eight-hour work.
                                </p>
                                <p class="ps-4 mb-3">
                                    D.1.2. Considering the nature of the company’s business, however, the
                                    management may require you to work during rest days and holiday if
                                    an emergency or the situation calls for it, this can be compensated with
                                    overtime pay or can be offset with regular working days as rest day in
                                    replacement of the consumed day for work whichever is approved by
                                    the management.
                                </p>
                                <p class="ps-4 mb-3">
                                    D.1.3. An employee who arrives one (1) minute or more after the specified
                                    start time is deemed tardy; an employee who leaves the work area
                                    before the shift ends is considered undertime.
                                </p>
                                <p class="ps-4 mb-3">
                                    D.1.4. Missed logs due to negligence shall constitute salary deduction
                                    and disciplinary action.
                                </p>
                                <p class="ps-4 mb-3">
                                    D.1.4. Missed logs due to negligence shall constitute salary deduction
                                    and disciplinary action.
                                </p>


                                <div class="container my-4">
                                    <div class="row">
                                        <div class="col-12">

                                            <!-- Salary Deduction Rules -->
                                            <p class="fw-semibold">
                                                The following rules for salary deduction shall apply :
                                            </p>

                                            <div class="ms-3">
                                                <div class="d-flex">
                                                    <div class="me-3">Failure to Clock In</div>
                                                    <div>: Null first four (4) hours of the shift or four (4)
                                                        hours deduction</div>
                                                </div>

                                                <div class="d-flex">
                                                    <div class="me-3">Failure to Clock out</div>
                                                    <div>: Null first four (4) hours of the shift or four (4)
                                                        hours deduction</div>
                                                </div>

                                                <div class="d-flex">
                                                    <div class="me-3">Failure to Clock in/out</div>
                                                    <div>: Null one (1) day shift or eight (8) hours deduction
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Disciplinary Action Rules -->
                                            <p class="fw-semibold mt-4">
                                                The following rules for disciplinary action shall apply :
                                            </p>

                                            <p class="ms-3">
                                                Two counts of failure to log within a pay period shall
                                                constitute a single offense.
                                            </p>

                                            <div class="ms-3">
                                                <div class="d-flex">
                                                    <div class="me-3">1st offense</div>
                                                    <div>: Written Reprimand with warning of suspension</div>
                                                </div>

                                                <div class="d-flex">
                                                    <div class="me-3">2nd offense</div>
                                                    <div>: 2-5 days suspension</div>
                                                </div>

                                                <div class="d-flex">
                                                    <div class="me-3">3rd offense</div>
                                                    <div>: 5-10 days suspension</div>
                                                </div>

                                                <div class="d-flex">
                                                    <div class="me-3">4th offense</div>
                                                    <div>: Termination</div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <p class="ps-4 mb-3">
                                    D.1.5. Employees are only allowed to clock in and out one (1) hour before
                                    and after a shift, in case of device or system error/internet connectivity
                                    issues, except those rendering overtime.
                                </p>
                                <p class="ps-4 mb-3">
                                    D.1.6. It is the employee's responsibility to notify his immediate
                                    supervisor
                                    of his tardiness at least two (2) hours prior to his or her official start
                                    time.
                                    The employee must also state when he or she expects to arrive at work.
                                </p>
                                <p class="ps-4 mb-3">
                                    D.1.7. The employee's notification will be acknowledged by the
                                    immediate supervisor. If the supervisor does not acknowledge your
                                    tardiness, it may be considered unexcused and may be subject to
                                    disciplinary action.
                                </p>
                                <p class="ps-4 mb-3">
                                    D.1.8. The COMPANY, through its management, shall set the work
                                    schedule and may change the same as necessary to meet its
                                    operational requirements. Likewise, the employee agrees to any flexible
                                    work arrangements that may be established from time to time
                                    depending on the reasonable requirements of the business operations.

                                </p>
                                <p class="ps-4 mb-4">
                                    D.1.9. The employee shall devote all his/her working hours to the affairs
                                    of the COMPANY.

                                </p>

                                <p class="ps-3 mb-3">
                                    <strong>
                                        D.2. POLICY ON LEAVES
                                    </strong>
                                </p>
                                <p class="ps-3 mb-3">
                                    <strong>
                                        D.2. VACATION LEAVE
                                    </strong>
                                </p>
                                <p class="ps-3 mb-3">
                                    D.2.1.1. All regular employees are entitled to avail seven (7) days
                                    Vacation Leave and five (5) days Sick Leave every year. Newly
                                    regularized employees are entitled to the monthly earned leaves after
                                    regularization.
                                </p>
                                <p class="ps-3 mb-3">
                                    D.2.1.2. All leave credits refresh by January of the following year.
                                    Employees accrue sick leave at the rate of 0.4 days per month
                                    equivalent to 5 days for 1 calendar year. In the same manner,
                                    employees accrue vacation leave at the rate of 0.6 days per month
                                    equivalent to 7 days for 1 calendar year.
                                </p>
                                <p class="ps-3 mb-3">
                                    D.2.1.3. The Company shall pay the cash equivalent of the employee’s
                                    unused Sick Leave credits at the end of the calendar year.
                                </p>
                                <p class="ps-3 mb-3">
                                    D.2.1.4. All Vacation Leave requests shall be filed two (2) weeks prior to
                                    the applicable date and must be pre- approved by either Management,
                                    Immediate Supervisors, or Delegators
                                </p>
                                <p class="ps-3 mb-3">
                                    D.2.1.5. The Perfect Attendance Bonus will not be affected by pre
                                    approved leaves with a two-week notice. The following filing procedures
                                    must be followed:
                                <ol class="mx-5">
                                    <li class="mb-3">
                                        Employees (VA) who plan to take Vacation Leave shall inform
                                        their immediate Supervisors or Delegators. It is the
                                        responsibility of the immediate Supervisors to ensure that all
                                        tasks during the VA’s vacation period are handled.
                                    </li>
                                    <li class="mb-3">
                                        Employees (VA) who have direct contact with the client must
                                        obtain the client's approval. If leave is granted, VA will attach
                                        a screenshot of the approval to the leave application.
                                    </li>
                                    <li class="mb-3">
                                        Supervisors who wish to take Vacation Leave must first
                                        request approval from the Operations Manager.
                                    </li>
                                    <li class="mb-3">
                                        The Operations Manager, HR, Accounting, and Admin must all
                                        request permission from Upper Management, in the same
                                        manner.
                                    </li>
                                </ol>

                                </p>
                                <p class="ps-3 mb-4">
                                    D.2.1.6. Vacation Leave requests filed in less than two (2) weeks or
                                    absence of a Leave Form may be automatically disapproved and
                                    Perfect Attendance bonus for the payroll period in which the leave is
                                    taken may be forfeited, unless otherwise considered by Upper
                                    Management. Leaves without approval will be considered as leave
                                    without pay.
                                </p>

                                <p class="ps-3 mb-3">
                                    <strong>
                                        D.2.2. SICK LEAVE
                                    </strong>
                                </p>
                                <p class="ps-3 mb-3">
                                    D.2.2.1. Employees with excused absences because of illness or injury
                                    must inform his/her immediate Supervisor or Delegators on the day of
                                    his absence through any reasonable means for the latter to make
                                    certain adjustments if need be.
                                </p>
                                <p class="ps-3 mb-3">
                                    D.2.2.2. Upon return to work, the employee must file the Sick Leave form
                                    so his/her absence is properly documented.
                                </p>
                                <p class="ps-3 mb-3">
                                    D.2.2.3. The employee must provide a medical certificate and provide a
                                    proof of physician’s care for absences of two (2) or more days.
                                </p>
                                <p class="ps-3 mb-3">
                                    *The medical certificate requirement is temporarily waived due to the
                                    continuing danger of the pandemic, which makes it impossible to
                                    attend hospitals and clinics for check-ups.
                                </p>
                                <p class="ps-3 mb-4">
                                    D.2.2.4. Employees with Health Insurance (HMO) are required to avail
                                    services from HMO accredited physicians, hospitals, or teleconsultation.
                                </p>

                                <p class="ps-3 mb-3">
                                    <strong>
                                        D.2.3. EMERGENCY LEAVE
                                    </strong>
                                </p>
                                <p class="ps-3 mb-3">
                                    D.2.3.1. Employees may take Emergency Leave and take time off work
                                    immediately due to unforeseen circumstances.
                                </p>
                                <p class="ps-3 mb-3">
                                    D.2.3.2. In all cases, the right to leave will be limited to a reasonable
                                    amount of time, which will not exceed two working days.
                                </p>
                                <p class="ps-3 mb-3">
                                    D.2.3.3. Employeesmust notify their immediate Supervisor, Delegator, or
                                    Human Resources as soon as reasonably possible about the reason for
                                    their absence and agree on a return date.
                                </p>
                                <p class="ps-3 mb-4">
                                    D.2.3.4. Employees can use their existing Vacation Leave credits for paid
                                    Emergency Leave day/s.
                                </p>

                                <p class="ps-3 mb-3">
                                    <strong>
                                        D.2.4. MATERNITY LEAVE or Expanded Maternity Leave under
                                        R.A. No. 11210
                                    </strong>
                                </p>
                                <p class="ps-3 mb-3">
                                    D.2.4.1. This benefit applies to all female employees, regardless of civil
                                    status, employment status, and legitimacy of her child. The expectant
                                    mother/female employee must adhere to the following procedure:
                                <ol class="mx-5">
                                    <li class="mb-3">
                                        Give formal written notice (Maternity Leave Notification Form)
                                        to her immediate Supervisor and Human Resources about the
                                        pregnancy, on the first trimester (3 months into pregnancy).
                                    </li>
                                    <li class="mb-3">
                                        Submit necessary documents stating the date of expected
                                        childbirth, desired beginning date of (it must not be earlier
                                        than a specified number of weeks before childbirth).

                                    </li>
                                </ol>
                                </p>

                                <p class="ps-3 mb-3">
                                    D.2.4.2. Under the Expanded Maternity Leave under R.A. No. 11210, the
                                    expectant female employee is entitled to a maternity leave period of
                                    one hundred and five (105) days with pay and an option to extend for
                                    an additional thirty (30) days without pay. This also grants extension of
                                    fifteen (15) days for solo mothers, and for child-birth related purposes.
                                </p>
                                <p class="ps-3 mb-4">
                                    D.2.4.3. The maternity leave period is counted in calendar days, inclusive
                                    of Saturdays, Sundays, and holidays. This is in consonance with the rule
                                    that maternity leave should be availed of in a continuous and
                                    uninterrupted manner.
                                </p>

                                <p class="ps-3 mb-3">
                                    <strong>
                                        D.2.5. PATERNITY LEAVE or Paternity Leave Act of 1996, R.A. No.
                                        8187
                                    </strong>
                                </p>

                                <p class="ps-3 mb-3">
                                    D.2.5.1. Married male employees are entitled to seven (7) days Paternity
                                    Leave with full pay for the first four (4) deliveries of the legitimate
                                    spouse with whom he is cohabiting.
                                <ol class="mx-5">
                                    <li class="mb-3">

                                        The male employee must notify his immediate Supervisor and
                                        Human Resources of the pregnancy of his legitimate spouse
                                        and the expected date of such delivery within a reasonable
                                        period of time so adjustments can be made while he is on
                                        leave.
                                    </li>
                                    <li class="mb-3">

                                        He shall fill out the Paternity Leave Notification Form and
                                        submit to Human Resources with the photocopy of the
                                        doctor's certificate or photocopy of the Ultrasound.
                                    </li>

                                </ol>
                                </p>
                                <p class="ps-3 mb-4">
                                    D.2.5.2. Usage of the paternity leave shall be after the delivery whether
                                    continuous or intermittent depending on management prerogative.
                                </p>

                                <p class="ps-3 mb-3">
                                    <strong>
                                        D.2.6. SOLO PARENT LEAVE (R.A. No. 8972)
                                    </strong>
                                </p>

                                <p class="ps-3 mb-3">
                                    Employees left alone with the responsibility of parenthood are entitled to
                                    Solo Parent leave benefits as mandated by Republic Act No. 8972,
                                    otherwise known as the “Solo Parent’s Welfare Act of 2000”. The benefit
                                    applies to all solo parents and consists of seven (7) working days of
                                    leave credits with full pay. The following conditions for entitlement
                                    shall
                                    apply:
                                <ol class="mx-5" type="a">
                                    <li class="mb-3">
                                        The employee has rendered at least one (1) year of service, whether
                                        continuous or broken;
                                    </li>
                                    <li class="mb-3">
                                        The employee has notified the Company within
                                        a reasonable period of time;
                                    </li>
                                    <li class="mb-3">
                                        The employee has presented a Solo
                                        Parent Identification Card, which may be obtained from the DSWD office
                                        of the city or municipality where they reside.
                                    </li>
                                </ol>
                                </p>

                                <p class="ps-3 mb-3">
                                    <strong>
                                        D.2.7. LEAVE FOR VICTIMS OF VIOLENCE AGAINST WOMEN AND
                                        THEIR CHILDREN (VAWC) (R.A.. No. 9262)
                                    </strong>
                                </p>
                                <p class="ps-3 mb-3">
                                    D.2.7.1. Female employees who are victims of physical, sexual,
                                    psychological harm or suffering, or economic abuse are entitled to ten
                                    (10) paid days leave. The leave benefit shall cover the days that the
                                    female employee has to attend to medical and legal concerns,
                                    provided that: (RA 9262)
                                </p>
                                <p class="ps-3 mb-3">
                                    D.2.7.2. The victim female employee presents to her employer a
                                    certification from the barangay chairman (Punong Barangay) or
                                    barangay kagawad or prosecutor or the Clerk of Court that an action
                                    relative to the matter is pending.
                                </p>

                                <p class="ps-3 mb-3">
                                    <strong>
                                        D.2.8. SPECIAL LEAVE FOR WOMEN (R.A. No. 9710)
                                    </strong>
                                </p>

                                <p class="ps-3 mb-3">
                                    D.2.8.1. Any female employee regardless of age and civil status shall be
                                    entitled to a special leave benefit of two (2) months wherein the she has
                                    undergone surgery due to gynecological disorders under such terms
                                    and conditions:
                                </p>
                                <p class="ps-3 mb-3">
                                    D.2.8.2. “Gynecological disorders” refers to disorders that would require
                                    surgical procedures such as, but not limited to dilatation and curettage
                                    and those involving female reproductive organs such as the vagina,
                                    cervix, uterus, fallopian tubes, ovaries, breast, adnexa and pelvic floor,
                                    as
                                    certified by a competent physician. It shall also include hysterectomy,
                                    ovariectomy and mastectomy.
                                </p>
                                <p class="ps-5 mb-3">
                                    Conditions for Entitlement:
                                <ol class="mx-5">
                                    <li class="mb-3">

                                        She has rendered at least six (6) months continuous
                                        aggregate employment service for the last twelve (12)
                                        months prior to surgery;
                                    </li>
                                    <li class="mb-3">
                                        She has filed an application for special leave with her
                                        employer within a reasonable period of time from the
                                        expected date of surgery or within such period as may be
                                        provided by company rules and regulations or collective
                                        bargaining agreement; and
                                    </li>
                                    <li class="mb-4">
                                        She has undergone surgery due to gynecological
                                        disorders as certified by a competent physician.
                                    </li>
                                </ol>
                                </p>

                                <p class="ps-3 mb-3">
                                    <strong>
                                        D.3. STANDARD RESPONSE TIME POLICY
                                    </strong>
                                </p>
                                <p class="ps-4 mb-3">
                                    D.3.1. The purpose of this policy is to establish uniform standards and
                                    procedures for responding to inter-office communications, ensuring
                                    that responses are timely and no unforeseen issues arise. The following
                                    standards must be observed:
                                <ol class="mx-5">
                                    <li class="mb-3">
                                        All work-related messages received during work hours
                                        (excluding breaks) should be answered in real-time or
                                        maximum of 15 minutes.
                                    </li>
                                    <li class="mb-3">
                                        Unanswered messages received during team/client
                                        meetings and emergencies may be acceptable in such
                                        cases.
                                    </li>
                                    <li class="mb-3">
                                        Any employee (leader, delegator, or doer) whose
                                        messages have been ignored for more than 15 minutes
                                        may file a complaint with HR via email, accompanied by a
                                        screenshot of the conversation with a timestamp as proof.
                                    </li>
                                    <li class="mb-3">
                                        All complaints received by HR, leaders, and Operations
                                        Manager will be thoroughly investigated to ensure a fair
                                        and objective evaluation.
                                    </li>
                                    <li class="mb-3">
                                        All complaints received by HR, leaders, and Operations
                                        Manager will be thoroughly investigated to ensure a fair
                                        and objective evaluation.
                                    </li>
                                </ol>
                                </p>
                                <p class="ps-4 mb-4">
                                    D.3.2. This policy also outlines the employee’s responsibility to stay
                                    connected and reachable during work hours, and set dedicated “off
                                    line” hours after shift.
                                </p>
                                <hr class="my-5" />
                            </div>

                        </section>



                        <!-- PERFORMANCE EVALUATION -->
                        <section id="performance-eval" class="ehb-section">
                            <h2 class="h3 mb-4 text-dark">E. PERFORMANCE EVALUATION</h2>
                            <div class="ehb-body text-dark">


                                <p class="ps-3 mb-3">
                                    E.1. The performance evaluations will be done semi-annually. The
                                    evaluations will
                                    take place on June and December
                                </p>
                                <p class="ps-3 mb-3">
                                    E.2. The immediate supervisor should do a performance evaluation on the
                                    5th
                                    month of employment for employees approaching their sixth (6th) month or
                                    180th day (for regularization).
                                </p>
                                <p class="ps-3 mb-3">
                                    E.3. The probationer’s Supervisor or Delegator shall carefully observe
                                    conduct and
                                    performance of the probationer. It is imperative that the supervisor:
                                <ol class="mx-4" type="A">
                                    <li class="mb-3">
                                        Review the contents of the evaluation with the employee and sign and
                                        date the form.
                                    </li>
                                    <li class="mb-3">
                                        Have the employee sign and date the form.
                                    </li>
                                    <li class="mb-3">
                                        Return the original to Human Resources by the due date.
                                    </li>
                                </ol>
                                </p>

                                <p class="ps-3 mb-3">
                                    E.4. If the conduct or performance of the probationer is unsatisfactory:
                                <ol class="mx-4" type="A">
                                    <li class="mb-3">
                                        Employment may be terminated before completion of the maximum
                                        period of probation;
                                    </li>
                                    <li class="mb-4">
                                        The employee must be notified in writing of the decision to terminate
                                        two weeks in advance.
                                    </li>
                                </ol>
                                </p>

                                <hr class="my-5" />
                            </div>
                        </section>

                        <!-- TYPES OF TERMINATION OF EMPLOYEE CONTRACT  -->
                        <section id="types-term" class="ehb-section">
                            <h2 class="h3 mb-4 text-dark">F. TYPES OF TERMINATION OF EMPLOYEE CONTRACT</h2>
                            <div class="ehb-body text-dark">

                                <p class="ps-3 mb-3">
                                    <strong>
                                        F.1. TERMINATION BY EMPLOYEE or RESIGNATION
                                    </strong>
                                </p>

                                <p class="ps-3 mb-3">
                                    F.1.2. The COMPANY also reserves the right to accept the resignation to
                                    take effect
                                    immediately, or sooner than the date indicated therein upon approval of
                                    management or immediate superior, without any obligation to indemnify
                                    and/or
                                    pay the employee whatsoever except for their final pay, if any.
                                </p>
                                <p class="ps-3 mb-3">
                                    F.1.3.Suppose the employee violates this prior notice requirement, they
                                    shall
                                    indemnify the COMPANY by way of liquidated damages, the sum equivalent to
                                    one (1) month gross remuneration, including such other consequential or
                                    incidental damages as may be appropriate in the circumstances. The COMPANY
                                    shall withhold from the employee’s compensation, benefits, and allowances,
                                    if
                                    any, including from final pay, the total amount of such damages, and
                                    further
                                    authorize the COMPANY to apply the withheld amount, as and by way of
                                    payment
                                    and/or settlement of the employee’s obligation to the COMPANY.
                                </p>
                                <p class="ps-3 mb-3">
                                    F.1.4. Before the employment with the COMPANY ends due to resignation, the
                                    employee must immediately transfer and deliver all properties, documents,
                                    notes, manuals, specifications, files, or other records or things of any
                                    nature that
                                    you may have physically or constructively possessed as a result of
                                    employment
                                    with the COMPANY, or any reproduction thereof.
                                </p>



                                <p class="ps-3 mb-3">
                                    <strong>
                                        F.2. TERMINATION BY EMPLOYER DUE TO JUST/AUTHORIZED CAUSE
                                    </strong>
                                </p>
                                <p class="ps-3 mb-3">
                                    F.2.1. Substantive due process requires that employment be terminated for
                                    just or
                                    authorized reasons.
                                </p>
                                <p class="ps-3 mb-3">
                                    F.2.2. The Company may terminate an employment (Article 297 of the Labor
                                    Code) for any of the following just causes:
                                <ol class="mx-4" type="A">
                                    <li class="mb-3">
                                        serious misconduct or willful disobedience by the employee of the
                                        lawful orders of his employer or representative in connection with his
                                        work;
                                    </li>
                                    <li class="mb-3">
                                        gross and habitual neglect by the employee of his duties;
                                    </li>
                                    <li class="mb-3">
                                        fraud or willful breach by the employee of the trust reposed in him by
                                        his employer or duly authorized representatives;
                                    </li>
                                    <li class="mb-3">
                                        commission of a crime or offense by the employee against the person
                                        of his employer or any immediate member of his family or his duly
                                        authorized representatives; and
                                    </li>
                                    <li class="mb-3">
                                        other similar causes.
                                    </li>
                                </ol>
                                </p>

                                <p class="ps-3 mb-3">
                                    F.2.3. The Company may terminate an employee for authorized reasons such
                                    as
                                    business or health. According to Art. 283 of the Labor Code, an employee
                                    can be
                                    terminated for business reasons such as:
                                <ol class="mx-4" type="A">
                                    <li class="mb-3">
                                        installation of labor-saving devices;
                                    </li>
                                    <li class="mb-3">
                                        Redundancy;
                                    </li>
                                    <li class="mb-3">
                                        fretrenchment (reduction of costs) to prevent losses; or
                                    </li>
                                    <li class="mb-3">
                                        the closing or cessation of operation.
                                    </li>
                                </ol>
                                </p>

                                <p class="ps-3 mb-4">
                                    F.2.4. The Company may also terminate the services of an employee who has
                                    been diagnosed with a disease and whose continued employment is prohibited
                                    by law or is detrimental to his health and the health of his coworkers.
                                </p>

                                <p class="ps-3 mb-3">
                                    <strong>
                                        F.3. OFF-DETAIL/TEMPORARY LAY-OFF
                                    </strong>
                                </p>
                                <p class="ps-3 mb-3">
                                    F.3.1. The Employee may be placed under “off-detail” or reserved status,
                                    or be
                                    temporary laid off in accordance with the Labor Code, if and when, in the
                                    judgment of the COMPANY there is no job, work, service or activity that is
                                    available to you while under employ due to business and operational needs
                                    and
                                    other conditions.
                                </p>
                                <p class="ps-3 mb-3">
                                    F.3.2. In such a case, the employment shall be deemed suspended and the
                                    employee shall not be entitled to salary, and benefit/s and allowance/s,
                                    if any, for
                                    the duration of such off detail, reserved status or temporary lay-off.
                                    While not
                                    employed and awaiting further assignment from the COMPANY, the employee is
                                    free to offer services to any other employer but subject to the prior
                                    approval of
                                    the COMPANY and the employment limitations or restrictions provided in
                                    this
                                    Contract.
                                </p>




                                <hr class="my-5" />
                            </div>

                        </section>

                        <!-- . TYPES OF TERMINATION OF EMPLOYEE CONTRACT -->
                        <section id="types-term2" class="ehb-section">
                            <h2 class="h3 mb-4 text-dark">G. TYPES OF TERMINATION OF EMPLOYEE CONTRACT</h2>
                            <div class="ehb-body text-dark">
                                <p class="ps-3 mb-3">
                                    G.1. In case of termination of employment, the employee is obliged to
                                    apply
                                    promptly and process his separation clearance to ensure that he has no
                                    debt,
                                    obligation, and/or accountability.
                                </p>
                                <p class="ps-3 mb-3">
                                    G.2.Such clearance shall include but not limited to voluntarily returning
                                    to the
                                    COMPANY the uniform, identification card, and all property, documents,
                                    data, and
                                    records in the employee's possession or custody, without the need of
                                    demand.
                                </p>
                                <p class="ps-3 mb-3">
                                    G.3. For this purpose, the COMPANY is authorized to withhold the
                                    employee’s
                                    wages/salary, benefits, allowances etc., until such time he is cleared
                                    from any
                                    such debt, obligation and/or accountability, and further authorizing the
                                    COMPANY to use and apply such withheld amount/s, as and by way of payment
                                    and/or settlement of such debt, obligation and/or accountability, without
                                    prejudice to such other remedies the COMPANY may have against the employee
                                    under the law.
                                </p>




                                <hr class="my-5" />
                            </div>

                        </section>


                        <!-- DATA PRIVACY CONTENT  -->
                        <section id="data-privacy" class="ehb-section">
                            <h2 class="h3 mb-4 text-dark">H. DATA PRIVACY CONTENT</h2>
                            <div class="ehb-body text-dark">
                                <p class="ps-3 mb-3">
                                    To the extent permitted by law or as may be provided by existing COMPANY
                                    policy on data privacy protection, the employee agrees to give his free
                                    and
                                    voluntary consent and approval that the COMPANY may obtain, retain, store
                                    or
                                    otherwise process his personal information, including sensitive personal
                                    information, and consent to the disclosure thereof to another person or to
                                    its
                                    transfer to another country. Such agreement and consent include the
                                    Company’s monitoring of all communications and activities on or using the
                                    Company’s equipment, system and network, which may include personal
                                    communication.
                                </p>

                                <hr class="my-5" />
                            </div>

                        </section>

                        <!-- INTELLECTUAL PROPERTY RIGHTS  -->
                        <section id="intellectual-property" class="ehb-section">
                            <h2 class="h3 mb-4 text-dark">I. INTELLECTUAL PROPERTY RIGHTS</h2>
                            <div class="ehb-body text-dark">
                                <p class="ps-3 mb-3">
                                    I.1. The COMPANY is or will be the exclusive owner of all intellectual
                                    property rights,
                                    including copyrights, in inventions, discoveries, adaptations, patentable
                                    processes, designs, works and other materials created or generated by the
                                    employee, either solely or jointly with others, in the course of his
                                    employment.
                                </p>
                                <p class="ps-3 mb-3">
                                    I.2. Moreover, the employee binds that any work, publication, new ideas,
                                    proprietary data or information and the like in respect to any subject
                                    matter
                                    relating to the business of the COMPANY, that he may conceive, make or
                                    develop
                                    at the start of, and during the course of his employment with us, using
                                    inherent
                                    or acquired knowledge, skill or talent, or inventive faculties, regardless
                                    of whether
                                    part of your regular duties or assignment or not, shall be or become, the
                                    Company’s exclusive and sole property with no right to compensation or
                                    indemnity.
                                </p>

                                <hr class="my-5" />
                            </div>

                        </section>

                        <!-- USE OF FACILITIES AND RESOURCES  -->
                        <section id="use-facilities" class="ehb-section">
                            <h2 class="h3 mb-4 text-dark">J. USE OF FACILITIES AND RESOURCES</h2>
                            <div class="ehb-body text-dark">
                                <p class="ps-3 mb-3">
                                    J.1. The e-mail, internet and computer process or system are owned by the
                                    COMPANY. Thus, the employee agrees to possess no right to privacy in the
                                    use
                                    thereof. We reserve our right to prohibit, restrict, or regulate their use
                                    of such e
                                    mail, internet and computer process or system, and they expressly agree
                                    and
                                    hereby consent to the right of the COMPANY to retrieve, save, read, store,
                                    reproduce or re-copy any and all e-mail communications for whatever legal
                                    purpose it may serve.
                                </p>
                                <p class="ps-3 mb-3">
                                    J.2. The employee is prohibited and not allowed to use office computers
                                    and/or
                                    office machines, devices and equipment, telephone, company issued mobile
                                    phone units and other electronic devices for personal use and is further
                                    prohibited from using social media networking sites, channels or software,
                                    and
                                    the use of music/movie downloading device or software without express
                                    clearance from the management.
                                </p>
                                <p class="ps-3 mb-3">
                                    J.3. Violation of any of these shall be a ground for disciplinary action
                                    which could
                                    range from suspension without pay to dismissal from employment depending
                                    on
                                    gravity and frequency of violation.
                                </p>

                                <hr class="my-5" />
                            </div>

                        </section>

                        <!-- OUTSIDE EMPLOYMENT   -->
                        <section id="outside-employment" class="ehb-section">
                            <h2 class="h3 mb-4 text-dark">K. OUTSIDE EMPLOYMENT</h2>
                            <div class="ehb-body text-dark">
                                <p class="ps-3 mb-3">
                                    K.1. The employee agrees that during his employment with the Company, he
                                    shall
                                    not directly or indirectly enter the employment of, or render any
                                    professional
                                    services, except such as are rendered at the request of the COMPANY, to
                                    any
                                    individual, partnership, association or corporation whether or not the
                                    same is a
                                    competitor of the COMPANY without the prior permission in writing of the
                                    COMPANY.
                                </p>
                                <p class="ps-3 mb-3">
                                    K.2. Furthermore, they shall not engage in an activity outside the scope
                                    of his
                                    employment if such activity is prejudicial to, or conflicts or tends to
                                    conflict with
                                    the interest of the COMPANY, or conflicts or tends to conflict with their
                                    obligation
                                    duties and responsibilities under this agreement, or would require
                                    substantial
                                    time or services on his part, whether within or outside working hours.
                                </p>
                                <p class="ps-3 mb-3">
                                    K.3. The employee shall give immediate notice to the COMPANY of any
                                    possible
                                    conflict of interest they may have.
                                </p>
                                <p class="ps-3 mb-3">
                                    K.4. Finally, unless otherwise permitted by the COMPANY in writing, the
                                    employee
                                    is also prohibited from engaging in a second job, or outside employment
                                    whether
                                    on a full time or part time basis without the written permission of the
                                    COMPANY
                                    regardless of whether there is conflict of interest or not.
                                </p>

                                <hr class="my-5" />
                            </div>

                        </section>


                        <!--EMPLOYEE NON-COMPETE CLAUSE -->
                        <section id="non-compete" class="ehb-section">
                            <h2 class="h3 mb-4 text-dark">L. EMPLOYEE NON-COMPETE CLAUSE </h2>
                            <div class="ehb-body text-dark">
                                <p class="ps-3 mb-3">
                                    L.1. The employee shall not have any share or ownership, directly or
                                    indirectly, in a
                                    local or abroad business which may render himself a competitor of the
                                    COMPANY
                                    nor act or enter into any transactionwhich may, in any manner compete or
                                    help
                                    any person to compete with COMPANY or with any of its businesses during
                                    the
                                    employment, including 3 (three) years after the employee’s term with the
                                    COMPANY.
                                </p>
                                <p class="ps-3 mb-3">
                                    L.2. However, if what involves is purely occupational engagement for the
                                    employee to have a work after his employment termination with the COMPANY,
                                    the aforementioned period of prohibition is hereby reduced to 1 (one)
                                    year.
                                </p>
                                <p class="ps-3 mb-3">
                                    L.3. In addition to proper sanctions as may be provided for by laws, in
                                    the event
                                    that the employee breaches the aforementioned obligations, he shall be
                                    liable to
                                    pay liquidated damages to the COMPANY in the amount of not less than One
                                    Hundred Thousand Pesos (PHP100,000.00).
                                </p>
                                <hr class="my-5" />
                            </div>

                        </section>

                        <!--NON-SOLICITATION AND NON-POACHING OF CLIENTS CLAUSE -->
                        <section id="non-solicitation" class="ehb-section">
                            <h2 class="h3 mb-4 text-dark">M. NON-SOLICITATION AND NON-POACHING OF CLIENTS
                                CLAUSE </h2>
                            <div class="ehb-body text-dark">
                                <p class="ps-3 mb-3">
                                    M.1. The employee shall not solicit, directly or indirectly, on his own
                                    behalf or on
                                    behalf of any other person(s), any client of the Company to whom the
                                    Company
                                    had provided services at any time during his employment in any line of
                                    business,
                                    including three (3) years after his employment with the Company.
                                </p>
                                <p class="ps-3 mb-3">
                                    M.2. The employee, likewise, agrees not to induce or attempt to induce,
                                    either for
                                    his own account or in conjunction with or on behalf of any other person,
                                    any
                                    director, manager, officer, executive or employee of the Company to work
                                    for
                                    another company, or otherwise terminate that person’s employment.
                                </p>
                                <p class="ps-3 mb-3">
                                    M.3. In addition to proper sanctions as may be provided for by laws, in
                                    the event
                                    that he breaches the aforementioned obligations, he shall be liable to pay
                                    liquidated damages to the COMPANY in the amount of not less than One
                                    Hundred Thousand Pesos (PHP100, 000.00).
                                </p>
                                <p class="ps-3 mb-3">
                                    M.4. Further, the provisions of this handbook, such as but not limited to
                                    compensation provision, are likewise confidential and should not be
                                    disclosed to
                                    any person unless there is a written consent from the COMPANY or upon
                                    order of
                                    a competent court.
                                </p>
                                <hr class="my-5" />
                            </div>

                        </section>


                        <!--CONFIDENTIALITY AGREEMENT -->
                        <section id="confidentiality-agreement" class="ehb-section">
                            <h2 class="h3 mb-4 text-dark">N. CONFIDENTIALITY AGREEMENT </h2>
                            <div class="ehb-body text-dark">
                                <p class="ps-3 mb-3">
                                    The employee understands and agrees that during the period of his
                                    employment
                                    and subsequent thereto, they is not allowed to disclose to others any
                                    confidential
                                    information entrusted to them. This includes but is not limited to all
                                    confidential
                                    technical and commercial information, specifications, quotations,
                                    formulae,
                                    computer records, client lists, price schedules and the like. In any event
                                    that you
                                    have violated any provision of this agreement, you understand that the
                                    company
                                    reserves the right to terminate your employment and take legal actions.
                                </p>
                                <hr class="my-5" />
                            </div>

                        </section>
                        <!--RULES OF CONDUCT  -->
                        <section id="rules-conduct" class="ehb-section">
                            <h2 class="h3 mb-4 text-dark">O. RULES OF CONDUCT </h2>
                            <div class="ehb-body text-dark">
                                <p class="ps-3 mb-3">
                                    O.1 The company shall provide a Code of Conduct, and the employee shall
                                    agree
                                    to abide by all the company rules and policies during employment.
                                </p>
                                <p class="ps-3 mb-3">
                                    O.2. In addition, the employee agrees to refrain, during his employment
                                    with the
                                    company, from engaging in any activity which is prejudicial to the
                                    interests of the
                                    company or which will interfere with the performance of his job, whether
                                    during
                                    or outside company hours, without the prior written consent of the
                                    company. The
                                    employee agrees to give immediate notice to the company of any possible
                                    conflict of interest, which they may have.
                                </p>
                                <p class="ps-3 mb-3">
                                    O.3. The employee also agrees to perform duties and responsibilities
                                    assigned to
                                    him with utmost zeal and dedication, to attain work expectations in an
                                    allocated
                                    reasonable period. He must absolutely refrain from producing
                                    unsatisfactory
                                    results in the performance rating or its equivalent. He hereby recognizes
                                    that
                                    gross inefficiency is analogous to the just causes for termination from
                                    employment.
                                </p>
                                <hr class="my-5" />
                            </div>

                        </section>






                        <!-- Acknowledgement -->
                        <section id="acknowledgement" class="ehb-section">
                            <h2 class="h3 mb-3 text-dark">Acknowledgement</h2>
                            <div class="ehb-body text-dark">
                                <p>
                                    By acknowledging this Code of Conduct, you confirm that you have read,
                                    understood,
                                    and
                                    agree to comply with all policies and standards outlined in this document.
                                    Your
                                    acknowledgement serves as a commitment to uphold these principles in your
                                    daily work
                                    and
                                    interactions.
                                </p>

                                <?php if (!$isSubmitted): ?>
                                <div class="alert alert-primary ehb-ack" role="alert">
                                    <form method="post" class="m-0">
                                        <div class="d-flex gap-3 align-items-start">
                                            <input class="form-check-input mt-1 ehb-check" type="checkbox"
                                                id="ehb_acknowledge" name="ehb_acknowledge" value="1"
                                                required />
                                            <label class="form-check-label text-dark" for="ehb_acknowledge">
                                                I acknowledge that I have read and understood the Code of
                                                Conduct. I
                                                agree to
                                                comply with all policies and standards outlined in this
                                                document and
                                                understand
                                                that violations may result in disciplinary action.
                                            </label>
                                        </div>

                                        <div class="d-flex flex-wrap gap-2 mt-3">
                                            <button type="submit" class="btn btn-primary ehb-submit">Agree
                                                &amp;
                                                Submit</button>
                                            <a href="#" class="btn btn-outline-secondary"
                                                role="button">Download
                                                Copy</a>
                                        </div>
                                    </form>
                                </div>
                                <?php else: ?>
                                <div class="alert alert-success ehb-success" role="alert">
                                    <div class="d-flex align-items-start gap-3">
                                        <div class="ehb-success-ico" aria-hidden="true">
                                            <i class="bi bi-check2"></i>
                                        </div>
                                        <div>
                                            <div class="h5 mb-1">Acknowledgment Submitted Successfully</div>
                                            <div class="small">
                                                Your acknowledgement has been recorded. Thank you for your
                                                commitment to
                                                our
                                                Code of Conduct.
                                            </div>
                                            <a href="#" class="btn btn-outline-success mt-3"
                                                role="button">Download
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