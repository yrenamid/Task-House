<?php

// Mock data for Task House Supervisor Dashboard

$accounts = [
	[
		'id' => 'ACC-001',
		'accountName' => 'TechStart Solutions',
		'clientFullName' => 'Sarah Mitchell',
		'clientEmail' => 'sarah.mitchell@techstart.com',
		'allocatedHours' => 160,
		'availableHours' => 87,
		'projectNotes' => 'Monthly retainer for ongoing development and support. Focus on React components and API integrations. Client prefers morning meetings EST. Priority: Website redesign project completion by end of Q2.'
	],
	[
		'id' => 'ACC-002',
		'accountName' => 'GreenLeaf Marketing',
		'clientFullName' => 'Michael Chen',
		'clientEmail' => 'mchen@greenleafmktg.com',
		'allocatedHours' => 120,
		'availableHours' => 45,
		'projectNotes' => 'Social media management and content creation. Weekly status calls on Fridays at 3 PM. Emphasis on brand consistency across platforms.'
	],
	[
		'id' => 'ACC-003',
		'accountName' => 'DataFlow Analytics',
		'clientFullName' => 'Amanda Rodriguez',
		'clientEmail' => 'a.rodriguez@dataflow.io',
		'allocatedHours' => 200,
		'availableHours' => 156,
		'projectNotes' => 'Data visualization dashboards using Recharts. Bi-weekly sprints with demo sessions. Client is very detail-oriented and prefers comprehensive documentation.'
	],
	[
		'id' => 'ACC-004',
		'accountName' => 'Urban Wellness Center',
		'clientFullName' => 'Dr. James Patterson',
		'clientEmail' => 'jpatterson@urbanwellness.com',
		'allocatedHours' => 80,
		'availableHours' => 23,
		'projectNotes' => 'Patient management system updates. HIPAA compliance required for all work. Monthly maintenance and feature additions.'
	],
	[
		'id' => 'ACC-005',
		'accountName' => 'EduBright Academy',
		'clientFullName' => 'Lisa Thompson',
		'clientEmail' => 'lisa.t@edubright.edu',
		'allocatedHours' => 150,
		'availableHours' => 112,
		'projectNotes' => 'Learning management system development. Focus on student engagement features and mobile responsiveness. Summer deployment target.'
	]
];

$tasks = [
	[
		'id' => 'TSK-1024',
		'accountId' => 'ACC-001',
		'description' => 'Build responsive navigation component with dropdown menus',
		'delegator' => 'John Daniels',
		'doer' => 'Jessica Lee',
		'hoursLeft' => 8,
		'status' => 'Working',
		'instructions' => 'Create a fully responsive navigation bar with dropdown support. Should work on mobile, tablet, and desktop. Include search functionality and user profile menu. Follow existing design system colors and spacing.',
		'attachments' => ['nav-design-mockup.pdf', 'brand-guidelines.pdf'],
		'notes' => 'Client requested smooth animations on dropdown hover',
		'history' => [
			['action' => 'Created', 'timestamp' => '2026-02-20T09:00:00Z', 'user' => 'Jessica Lee'],
			['action' => 'Started', 'timestamp' => '2026-02-20T10:30:00Z', 'user' => 'Jessica Lee'],
			['action' => 'Edited', 'timestamp' => '2026-02-21T14:20:00Z', 'user' => 'Jessica Lee']
		],
		'createdAt' => '2026-02-20T09:00:00Z'
	],
	[
		'id' => 'TSK-1025',
		'accountId' => 'ACC-001',
		'description' => 'Integrate payment gateway API with checkout flow',
		'delegator' => 'John Daniels',
		'doer' => null,
		'hoursLeft' => 16,
		'status' => 'Pending',
		'instructions' => 'Implement Stripe payment integration. Include error handling, loading states, and success confirmations. Test in sandbox environment before deploying.',
		'attachments' => ['stripe-api-docs.pdf'],
		'notes' => '',
		'history' => [
			['action' => 'Created', 'timestamp' => '2026-02-22T11:00:00Z', 'user' => 'John Daniels']
		],
		'createdAt' => '2026-02-22T11:00:00Z'
	],
	[
		'id' => 'TSK-1026',
		'accountId' => 'ACC-001',
		'description' => 'Fix mobile menu not closing on route change',
		'delegator' => 'John Daniels',
		'doer' => 'Marcus Johnson',
		'hoursLeft' => 2,
		'status' => 'For Approval',
		'instructions' => 'Debug and fix the issue where mobile navigation menu stays open after clicking a link. Ensure smooth UX across all mobile devices.',
		'attachments' => [],
		'notes' => 'Bug reported by client during testing',
		'history' => [
			['action' => 'Created', 'timestamp' => '2026-02-19T15:00:00Z', 'user' => 'Sarah Mitchell'],
			['action' => 'Started', 'timestamp' => '2026-02-19T16:00:00Z', 'user' => 'Sarah Mitchell'],
			['action' => 'Submitted for approval', 'timestamp' => '2026-02-22T10:00:00Z', 'user' => 'Sarah Mitchell']
		],
		'createdAt' => '2026-02-19T15:00:00Z'
	],
	[
		'id' => 'TSK-1027',
		'accountId' => 'ACC-002',
		'description' => 'Create social media content calendar for March',
		'delegator' => 'John Daniels',
		'doer' => 'Emily Davis',
		'hoursLeft' => 12,
		'status' => 'Working',
		'instructions' => 'Develop a comprehensive content calendar for all social platforms (Instagram, LinkedIn, Twitter, Facebook). Include post copy, hashtags, and visual concepts. Align with spring marketing campaign.',
		'attachments' => ['march-campaign-brief.pdf', 'brand-voice-guide.pdf'],
		'notes' => 'Client wants preview by Feb 25',
		'history' => [
			['action' => 'Created', 'timestamp' => '2026-02-18T09:00:00Z', 'user' => 'John Daniels'],
			['action' => 'Assigned to Emily Davis', 'timestamp' => '2026-02-18T09:30:00Z', 'user' => 'John Daniels'],
			['action' => 'Started', 'timestamp' => '2026-02-18T14:00:00Z', 'user' => 'Emily Davis']
		],
		'createdAt' => '2026-02-18T09:00:00Z'
	],
	[
		'id' => 'TSK-1028',
		'accountId' => 'ACC-003',
		'description' => 'Build interactive revenue dashboard with Recharts',
		'delegator' => 'John Daniels',
		'doer' => 'David Kim',
		'hoursLeft' => 24,
		'status' => 'Working',
		'instructions' => 'Create an interactive dashboard showing revenue metrics. Use Recharts for all visualizations. Include: line charts for trends, bar charts for comparisons, and pie charts for distribution. Add filters for date range and categories.',
		'attachments' => ['dashboard-requirements.pdf', 'sample-data.csv'],
		'notes' => 'High priority - demo scheduled for Feb 28',
		'history' => [
			['action' => 'Created', 'timestamp' => '2026-02-21T08:00:00Z', 'user' => 'Amanda Rodriguez'],
			['action' => 'Started', 'timestamp' => '2026-02-21T10:00:00Z', 'user' => 'Amanda Rodriguez']
		],
		'createdAt' => '2026-02-21T08:00:00Z'
	],
	[
		'id' => 'TSK-1029',
		'accountId' => 'ACC-004',
		'description' => 'Update patient appointment booking system',
		'delegator' => 'John Daniels',
		'doer' => null,
		'hoursLeft' => 10,
		'status' => 'Pending',
		'instructions' => 'Add recurring appointment functionality. Patients should be able to book weekly/monthly appointments. Include reminder notifications and cancellation options.',
		'attachments' => ['appointment-flow.pdf'],
		'notes' => 'HIPAA compliance review required before deployment',
		'history' => [
			['action' => 'Created', 'timestamp' => '2026-02-23T07:00:00Z', 'user' => 'James Patterson']
		],
		'createdAt' => '2026-02-23T07:00:00Z'
	]
];

$virtualAssistants = [
	[
		'id' => 'VA-001',
		'accountId' => 'ACC-001',
		'name' => 'Jessica Lee',
		'allocatedHours' => 40,
		'currentStatus' => 'Working'
	],
	[
		'id' => 'VA-002',
		'accountId' => 'ACC-001',
		'name' => 'Marcus Johnson',
		'allocatedHours' => 30,
		'currentStatus' => 'Idle'
	],
	[
		'id' => 'VA-003',
		'accountId' => 'ACC-002',
		'name' => 'Emily Davis',
		'allocatedHours' => 40,
		'currentStatus' => 'Working'
	],
	[
		'id' => 'VA-004',
		'accountId' => 'ACC-002',
		'name' => 'Carlos Martinez',
		'allocatedHours' => 20,
		'currentStatus' => 'Break'
	],
	[
		'id' => 'VA-005',
		'accountId' => 'ACC-003',
		'name' => 'David Kim',
		'allocatedHours' => 50,
		'currentStatus' => 'Working'
	],
	[
		'id' => 'VA-006',
		'accountId' => 'ACC-003',
		'name' => 'Rachel Green',
		'allocatedHours' => 40,
		'currentStatus' => 'Idle'
	],
	[
		'id' => 'VA-007',
		'accountId' => 'ACC-004',
		'name' => 'Michael Brown',
		'allocatedHours' => 25,
		'currentStatus' => 'Idle'
	],
	[
		'id' => 'VA-008',
		'accountId' => 'ACC-005',
		'name' => 'Sophie Turner',
		'allocatedHours' => 45,
		'currentStatus' => 'Working'
	],
	[
		'id' => 'VA-009',
		'accountId' => 'ACC-005',
		'name' => 'Liam Chen',
		'allocatedHours' => 35,
		'currentStatus' => 'Working'
	]
];

$completedTasks = [
	[
		'id' => 'TSK-0998',
		'accountId' => 'ACC-001',
		'approvedDate' => '2026-02-18T16:00:00Z',
		'completedDate' => '2026-02-18T14:30:00Z',
		'description' => 'Implement user authentication with OAuth2.0',
		'workedHours' => 18,
		'doer' => 'Jessica Lee',
		'approvedBy' => 'John Daniels',
		'attachments' => ['auth-implementation.pdf', 'test-results.pdf'],
		'notes' => 'Successfully integrated Google and GitHub OAuth',
		'fullDescription' => 'Implemented complete OAuth2.0 authentication flow with Google and GitHub providers. Includes token refresh, session management, and secure cookie handling.'
	],
	[
		'id' => 'TSK-0999',
		'accountId' => 'ACC-001',
		'approvedDate' => '2026-02-15T11:00:00Z',
		'completedDate' => '2026-02-15T09:45:00Z',
		'description' => 'Design and build landing page hero section',
		'workedHours' => 12,
		'doer' => 'Marcus Johnson',
		'approvedBy' => 'John Daniels',
		'attachments' => ['hero-final.png'],
		'notes' => 'Client loved the gradient background effect',
		'fullDescription' => 'Created responsive hero section with animated gradient background, CTA buttons, and featured product carousel.'
	],
	[
		'id' => 'TSK-1001',
		'accountId' => 'ACC-002',
		'approvedDate' => '2026-02-17T15:30:00Z',
		'completedDate' => '2026-02-17T14:00:00Z',
		'description' => 'Write blog post series on sustainable marketing (5 posts)',
		'workedHours' => 15,
		'doer' => 'Emily Davis',
		'approvedBy' => 'John Daniels',
		'attachments' => ['blog-posts-draft.pdf'],
		'notes' => 'All posts optimized for SEO',
		'fullDescription' => 'Created five comprehensive blog posts covering various aspects of sustainable marketing practices, including case studies and actionable tips.'
	],
	[
		'id' => 'TSK-1002',
		'accountId' => 'ACC-003',
		'approvedDate' => '2026-02-16T10:00:00Z',
		'completedDate' => '2026-02-16T08:30:00Z',
		'description' => 'Set up automated data pipeline from PostgreSQL to dashboard',
		'workedHours' => 20,
		'doer' => 'David Kim',
		'approvedBy' => 'John Daniels',
		'attachments' => ['pipeline-architecture.pdf', 'performance-metrics.xlsx'],
		'notes' => 'Reduced data refresh time by 75%',
		'fullDescription' => 'Built automated ETL pipeline using Node.js and PostgreSQL triggers. Data now updates in real-time with efficient caching strategy.'
	],
	[
		'id' => 'TSK-1003',
		'accountId' => 'ACC-001',
		'approvedDate' => '2026-02-12T17:00:00Z',
		'completedDate' => '2026-02-12T15:20:00Z',
		'description' => 'Optimize website performance and Core Web Vitals',
		'workedHours' => 14,
		'doer' => 'Jessica Lee',
		'approvedBy' => 'John Daniels',
		'attachments' => ['performance-report.pdf'],
		'notes' => 'Achieved 95+ Lighthouse score across all metrics',
		'fullDescription' => 'Implemented image optimization, code splitting, lazy loading, and CDN integration. Significantly improved LCP, FID, and CLS scores.'
	]
];

$taskApprovals = [
	[
		'id' => 'TSK-1001',
		'date' => '2026-02-21',
		'accountName' => 'TechStart Solutions',
		'projectName' => 'Website Revamp',
		'description' => 'Implement responsive checkout summary and validation messages for all breakpoints.',
		'doer' => 'Jessica Lee',
		'billedHours' => 6,
		'billedMinutes' => 30,
		'workedHours' => 6,
		'workedMinutes' => 5,
		'status' => 'For Approval',
	],
	[
		'id' => 'TSK-1003',
		'date' => '2026-02-23',
		'accountName' => 'DataFlow Analytics',
		'projectName' => 'Revenue Dashboard',
		'description' => 'Create reusable chart legend controls for monthly and quarterly KPI views.',
		'doer' => 'David Kim',
		'billedHours' => 7,
		'billedMinutes' => 0,
		'workedHours' => 6,
		'workedMinutes' => 50,
		'status' => 'For Approval',
	],
	[
		'id' => 'TSK-1005',
		'date' => '2026-02-25',
		'accountName' => 'EduBright Academy',
		'projectName' => 'LMS Enhancements',
		'description' => 'Implement student progress summary widgets with role-based visibility rules.',
		'doer' => 'Sophie Turner',
		'billedHours' => 5,
		'billedMinutes' => 0,
		'workedHours' => 4,
		'workedMinutes' => 35,
		'status' => 'For Approval',
	],
	[
		'id' => 'TSK-1006',
		'date' => '2026-02-25',
		'accountName' => 'TechStart Solutions',
		'projectName' => 'Component Library',
		'description' => 'Document reusable UI patterns and update implementation notes for QA handoff.',
		'doer' => 'Marcus Johnson',
		'billedHours' => 2,
		'billedMinutes' => 30,
		'workedHours' => 2,
		'workedMinutes' => 25,
		'status' => 'For Approval',
	],
];

$incidentEmployees = [
	'Sarah Johnson',
	'Michael Chen',
	'Emily Rodriguez',
	'David Thompson',
	'Jessica Park',
	'Robert Kim',
];

$incidentReports = [
	[
		'id' => 'INC-001',
		'timestamp' => '2026-02-25 08:30:00',
		'notificationDate' => '2026-02-25',
		'incidentDate' => '2026-02-24',
		'employee' => 'Sarah Johnson',
		'category' => 'Absent',
		'reason' => 'Health',
		'attachment' => 'https://cataas.com/cat?width=320&height=220&t=inc001',
	],
	[
		'id' => 'INC-002',
		'timestamp' => '2026-02-24 14:15:00',
		'notificationDate' => '2026-02-24',
		'incidentDate' => '2026-02-24',
		'employee' => 'Michael Chen',
		'category' => 'Overtime',
		'reason' => 'Project deadline',
		'attachment' => 'https://cataas.com/cat?width=320&height=220&t=inc002',
	],
	[
		'id' => 'INC-003',
		'timestamp' => '2026-02-23 09:45:00',
		'notificationDate' => '2026-02-23',
		'incidentDate' => '2026-02-23',
		'employee' => 'Emily Rodriguez',
		'category' => 'Late',
		'reason' => 'Emergency',
		'attachment' => null,
	],
	[
		'id' => 'INC-004',
		'timestamp' => '2026-02-22 16:30:00',
		'notificationDate' => '2026-02-22',
		'incidentDate' => '2026-02-22',
		'employee' => 'David Thompson',
		'category' => 'Undertime',
		'reason' => 'Errand',
		'attachment' => 'https://cataas.com/cat?width=320&height=220&t=inc004',
	],
	[
		'id' => 'INC-005',
		'timestamp' => '2026-02-21 10:20:00',
		'notificationDate' => '2026-02-21',
		'incidentDate' => '2026-02-21',
		'employee' => 'Jessica Park',
		'category' => 'Absent',
		'reason' => 'Emergency',
		'attachment' => 'https://cataas.com/cat?width=320&height=220&t=inc005',
	],
	[
		'id' => 'INC-006',
		'timestamp' => '2026-02-20 18:00:00',
		'notificationDate' => '2026-02-20',
		'incidentDate' => '2026-02-20',
		'employee' => 'Robert Kim',
		'category' => 'Overtime',
		'reason' => 'System maintenance',
		'attachment' => 'https://cataas.com/cat?width=320&height=220&t=inc006',
	],
];

$dtrEmployees = [
	['id' => 'EMP-001', 'name' => 'Jerico Mercado', 'workStatus' => 'Idle'],
	['id' => 'EMP-002', 'name' => 'Raffy Beligra', 'workStatus' => 'Vacant'],
	['id' => 'EMP-003', 'name' => 'Lyndell Ray Arranquez', 'workStatus' => 'Idle'],
	['id' => 'EMP-004', 'name' => 'Bryan Villarubia', 'workStatus' => 'Vacant'],
	['id' => 'EMP-005', 'name' => 'Sarah Johnson', 'workStatus' => 'Active'],
	['id' => 'EMP-006', 'name' => 'Michael Chen', 'workStatus' => 'On Break'],
	['id' => 'EMP-007', 'name' => 'Emily Rodriguez', 'workStatus' => 'Active'],
	['id' => 'EMP-008', 'name' => 'David Thompson', 'workStatus' => 'Active'],
];

$clockLogs = [
	[
		'id' => 'LOG-001',
		'employeeName' => 'Sarah Johnson',
		'date' => '2026-02-26',
		'time' => '08:00 AM',
		'logType' => 'Clock In',
	],
	[
		'id' => 'LOG-002',
		'employeeName' => 'Sarah Johnson',
		'date' => '2026-02-26',
		'time' => '05:00 PM',
		'logType' => 'Clock Out',
	],
	[
		'id' => 'LOG-003',
		'employeeName' => 'Michael Chen',
		'date' => '2026-02-26',
		'time' => '08:15 AM',
		'logType' => 'Clock In',
	],
	[
		'id' => 'LOG-004',
		'employeeName' => 'Emily Rodriguez',
		'date' => '2026-02-26',
		'time' => '07:55 AM',
		'logType' => 'Clock In',
	],
	[
		'id' => 'LOG-005',
		'employeeName' => 'David Thompson',
		'date' => '2026-02-26',
		'time' => '08:30 AM',
		'logType' => 'Clock In',
	],
	[
		'id' => 'LOG-006',
		'employeeName' => 'Michael Chen',
		'date' => '2026-02-26',
		'time' => '12:00 PM',
		'logType' => 'Clock Out',
	],
	[
		'id' => 'LOG-007',
		'employeeName' => 'Michael Chen',
		'date' => '2026-02-26',
		'time' => '01:00 PM',
		'logType' => 'Clock In',
	],
	[
		'id' => 'LOG-008',
		'employeeName' => 'Emily Rodriguez',
		'date' => '2026-02-25',
		'time' => '08:00 AM',
		'logType' => 'Clock In',
	],
	[
		'id' => 'LOG-009',
		'employeeName' => 'Emily Rodriguez',
		'date' => '2026-02-25',
		'time' => '05:15 PM',
		'logType' => 'Clock Out',
	],
	[
		'id' => 'LOG-010',
		'employeeName' => 'David Thompson',
		'date' => '2026-02-25',
		'time' => '08:10 AM',
		'logType' => 'Clock In',
	],
	[
		'id' => 'LOG-011',
		'employeeName' => 'David Thompson',
		'date' => '2026-02-25',
		'time' => '06:00 PM',
		'logType' => 'Clock Out',
	],
];

// My Department page mock data 
$johnDanielsDepartmentAccounts = array_map(static function (array $account): array {
	$allocatedHours = (float) ($account['allocatedHours'] ?? 0);
	$availableHours = (float) ($account['availableHours'] ?? 0);

	return [
		'id' => (string) ($account['id'] ?? ''),
		'name' => (string) ($account['accountName'] ?? ''),
		'availableHours' => $availableHours,
		'allocatedHours' => $allocatedHours,
		'clientName' => (string) ($account['clientFullName'] ?? ''),
		'email' => (string) ($account['clientEmail'] ?? ''),
		'projectNotes' => (string) ($account['projectNotes'] ?? ''),
		'assignedHours' => $allocatedHours,
		'hoursLeft' => $availableHours,
	];
}, $accounts);

$departmentSupervisors = [
	[
		'id' => 'SUP-001',
		'name' => 'John Daniels',
		'accounts' => $johnDanielsDepartmentAccounts,
	],
	[
		'id' => 'SUP-002',
		'name' => 'Maria Garcia',
		'accounts' => [
			[
				'id' => 'ACC-004',
				'name' => 'Innovation Labs',
				'availableHours' => 30,
				'allocatedHours' => 140,
				'clientName' => 'Emily Thompson',
				'email' => 'emily@innovationlabs.com',
				'assignedHours' => 140,
				'hoursLeft' => 30,
			],
			[
				'id' => 'ACC-005',
				'name' => 'Global Systems',
				'availableHours' => 30,
				'allocatedHours' => 100,
				'clientName' => 'Michael Davis',
				'email' => 'michael@globalsystems.com',
				'assignedHours' => 100,
				'hoursLeft' => 30,
			],
		],
	],
	[
		'id' => 'SUP-003',
		'name' => 'David Lee',
		'accounts' => [
			[
				'id' => 'ACC-006',
				'name' => 'StartUp Ventures',
				'availableHours' => 20,
				'allocatedHours' => 80,
				'clientName' => 'Lisa Johnson',
				'email' => 'lisa@startupventures.com',
				'assignedHours' => 80,
				'hoursLeft' => 20,
			],
			[
				'id' => 'ACC-007',
				'name' => 'Enterprise Solutions',
				'availableHours' => 50,
				'allocatedHours' => 250,
				'clientName' => 'John Smith',
				'email' => 'john@enterprisesolutions.com',
				'assignedHours' => 250,
				'hoursLeft' => 50,
			],
		],
	],
];


$departmentTasks = [
	['id' => 'TASK-001', 'title' => 'Website Redesign', 'assignedTo' => 'Alice Johnson', 'dueDate' => '2026-03-15', 'status' => 'In Progress', 'accountId' => 'ACC-001'],
	['id' => 'TASK-002', 'title' => 'Database Migration', 'assignedTo' => 'Bob Smith', 'dueDate' => '2026-03-20', 'status' => 'Pending', 'accountId' => 'ACC-001'],
	['id' => 'TASK-003', 'title' => 'Mobile App Development', 'assignedTo' => 'Carlos Rivera', 'dueDate' => '2026-03-18', 'status' => 'In Progress', 'accountId' => 'ACC-002'],
	['id' => 'TASK-004', 'title' => 'API Integration', 'assignedTo' => 'Diana Chen', 'dueDate' => '2026-03-25', 'status' => 'Pending', 'accountId' => 'ACC-002'],
	['id' => 'TASK-005', 'title' => 'Cloud Infrastructure Setup', 'assignedTo' => 'Eric Thompson', 'dueDate' => '2026-03-12', 'status' => 'In Progress', 'accountId' => 'ACC-003'],
	['id' => 'TASK-006', 'title' => 'Security Audit', 'assignedTo' => 'Fiona Martinez', 'dueDate' => '2026-03-30', 'status' => 'Pending', 'accountId' => 'ACC-003'],
	['id' => 'TASK-007', 'title' => 'AI Model Training', 'assignedTo' => 'George Kim', 'dueDate' => '2026-03-16', 'status' => 'In Progress', 'accountId' => 'ACC-004'],
	['id' => 'TASK-008', 'title' => 'Data Analytics Dashboard', 'assignedTo' => 'Hannah Lee', 'dueDate' => '2026-03-22', 'status' => 'In Progress', 'accountId' => 'ACC-004'],
	['id' => 'TASK-009', 'title' => 'System Integration', 'assignedTo' => 'Ivan Rodriguez', 'dueDate' => '2026-03-14', 'status' => 'In Progress', 'accountId' => 'ACC-005'],
	['id' => 'TASK-010', 'title' => 'Performance Optimization', 'assignedTo' => 'Julia Wang', 'dueDate' => '2026-03-28', 'status' => 'Pending', 'accountId' => 'ACC-005'],
	['id' => 'TASK-011', 'title' => 'MVP Development', 'assignedTo' => 'Kevin Park', 'dueDate' => '2026-03-10', 'status' => 'In Progress', 'accountId' => 'ACC-006'],
	['id' => 'TASK-012', 'title' => 'User Testing', 'assignedTo' => 'Laura Garcia', 'dueDate' => '2026-03-19', 'status' => 'Pending', 'accountId' => 'ACC-006'],
	['id' => 'TASK-013', 'title' => 'ERP Implementation', 'assignedTo' => 'Michael Brown', 'dueDate' => '2026-03-17', 'status' => 'In Progress', 'accountId' => 'ACC-007'],
	['id' => 'TASK-014', 'title' => 'Custom Module Development', 'assignedTo' => 'Nancy Wilson', 'dueDate' => '2026-03-24', 'status' => 'In Progress', 'accountId' => 'ACC-007'],
	['id' => 'TASK-015', 'title' => 'Legacy System Migration', 'assignedTo' => 'Oscar Lopez', 'dueDate' => '2026-03-31', 'status' => 'Pending', 'accountId' => 'ACC-007'],
];

$departmentVirtualAssistants = [
	['id' => 'VA-001', 'name' => 'Alice Johnson', 'role' => 'Senior Developer', 'status' => 'Active', 'accountId' => 'ACC-001'],
	['id' => 'VA-002', 'name' => 'Bob Smith', 'role' => 'Database Administrator', 'status' => 'Active', 'accountId' => 'ACC-001'],
	['id' => 'VA-003', 'name' => 'Carlos Rivera', 'role' => 'Mobile Developer', 'status' => 'Active', 'accountId' => 'ACC-002'],
	['id' => 'VA-004', 'name' => 'Diana Chen', 'role' => 'API Developer', 'status' => 'Active', 'accountId' => 'ACC-002'],
	['id' => 'VA-005', 'name' => 'Eric Thompson', 'role' => 'Cloud Architect', 'status' => 'Active', 'accountId' => 'ACC-003'],
	['id' => 'VA-006', 'name' => 'Fiona Martinez', 'role' => 'Security Specialist', 'status' => 'Active', 'accountId' => 'ACC-003'],
	['id' => 'VA-007', 'name' => 'Greg Anderson', 'role' => 'DevOps Engineer', 'status' => 'Active', 'accountId' => 'ACC-003'],
	['id' => 'VA-008', 'name' => 'George Kim', 'role' => 'AI Engineer', 'status' => 'Active', 'accountId' => 'ACC-004'],
	['id' => 'VA-009', 'name' => 'Hannah Lee', 'role' => 'Data Analyst', 'status' => 'Active', 'accountId' => 'ACC-004'],
	['id' => 'VA-010', 'name' => 'Ivan Rodriguez', 'role' => 'Integration Specialist', 'status' => 'Active', 'accountId' => 'ACC-005'],
	['id' => 'VA-011', 'name' => 'Julia Wang', 'role' => 'Performance Engineer', 'status' => 'Active', 'accountId' => 'ACC-005'],
	['id' => 'VA-012', 'name' => 'Kevin Park', 'role' => 'Full Stack Developer', 'status' => 'Active', 'accountId' => 'ACC-006'],
	['id' => 'VA-013', 'name' => 'Laura Garcia', 'role' => 'QA Engineer', 'status' => 'Active', 'accountId' => 'ACC-006'],
	['id' => 'VA-014', 'name' => 'Michael Brown', 'role' => 'ERP Consultant', 'status' => 'Active', 'accountId' => 'ACC-007'],
	['id' => 'VA-015', 'name' => 'Nancy Wilson', 'role' => 'Senior Developer', 'status' => 'Active', 'accountId' => 'ACC-007'],
	['id' => 'VA-016', 'name' => 'Oscar Lopez', 'role' => 'Migration Specialist', 'status' => 'Active', 'accountId' => 'ACC-007'],
];

$departmentCompletedTasks = [
	['id' => 'COMP-001', 'title' => 'Initial Setup', 'completedBy' => 'Alice Johnson', 'completedDate' => '2026-02-15', 'accountId' => 'ACC-001'],
	['id' => 'COMP-002', 'title' => 'Requirements Gathering', 'completedBy' => 'Bob Smith', 'completedDate' => '2026-02-20', 'accountId' => 'ACC-001'],
	['id' => 'COMP-003', 'title' => 'Project Kickoff', 'completedBy' => 'Carlos Rivera', 'completedDate' => '2026-02-18', 'accountId' => 'ACC-002'],
	['id' => 'COMP-004', 'title' => 'Design Mockups', 'completedBy' => 'Diana Chen', 'completedDate' => '2026-02-25', 'accountId' => 'ACC-002'],
	['id' => 'COMP-005', 'title' => 'Infrastructure Planning', 'completedBy' => 'Eric Thompson', 'completedDate' => '2026-02-12', 'accountId' => 'ACC-003'],
	['id' => 'COMP-006', 'title' => 'Security Assessment', 'completedBy' => 'Fiona Martinez', 'completedDate' => '2026-02-22', 'accountId' => 'ACC-003'],
	['id' => 'COMP-007', 'title' => 'Data Collection', 'completedBy' => 'George Kim', 'completedDate' => '2026-02-16', 'accountId' => 'ACC-004'],
	['id' => 'COMP-008', 'title' => 'Dashboard Wireframes', 'completedBy' => 'Hannah Lee', 'completedDate' => '2026-02-28', 'accountId' => 'ACC-004'],
	['id' => 'COMP-009', 'title' => 'System Analysis', 'completedBy' => 'Ivan Rodriguez', 'completedDate' => '2026-02-14', 'accountId' => 'ACC-005'],
	['id' => 'COMP-010', 'title' => 'Baseline Testing', 'completedBy' => 'Julia Wang', 'completedDate' => '2026-02-26', 'accountId' => 'ACC-005'],
	['id' => 'COMP-011', 'title' => 'Product Research', 'completedBy' => 'Kevin Park', 'completedDate' => '2026-02-10', 'accountId' => 'ACC-006'],
	['id' => 'COMP-012', 'title' => 'Prototype Development', 'completedBy' => 'Laura Garcia', 'completedDate' => '2026-02-24', 'accountId' => 'ACC-006'],
	['id' => 'COMP-013', 'title' => 'Requirements Analysis', 'completedBy' => 'Michael Brown', 'completedDate' => '2026-02-17', 'accountId' => 'ACC-007'],
	['id' => 'COMP-014', 'title' => 'System Architecture Design', 'completedBy' => 'Nancy Wilson', 'completedDate' => '2026-02-23', 'accountId' => 'ACC-007'],
	['id' => 'COMP-015', 'title' => 'Data Mapping', 'completedBy' => 'Oscar Lopez', 'completedDate' => '2026-02-27', 'accountId' => 'ACC-007'],
];

// Account Balance page mock data 
$johnDanielsAccountBalances = array_map(static function (array $account): array {
	$assignedHours = (int) ($account['allocatedHours'] ?? 0);
	$availableHours = (int) ($account['availableHours'] ?? 0);
	$actualHours = max(0, $assignedHours - $availableHours);
	$budgetHours = $assignedHours + $availableHours;

	return [
		'id' => (string) ($account['id'] ?? ''),
		'accountName' => (string) ($account['accountName'] ?? ''),
		'budgetHours' => $budgetHours,
		'actualHours' => $actualHours,
		'availableHours' => $availableHours,
		'assignedHours' => $assignedHours,
	];
}, $accounts);

$accountBalances = array_merge($johnDanielsAccountBalances, [
	[
		'id' => 'ACC-006',
		'accountName' => 'StartUp Ventures',
		'budgetHours' => 100,
		'actualHours' => 40,
		'availableHours' => 60,
		'assignedHours' => 40,
	],
	[
		'id' => 'ACC-007',
		'accountName' => 'Enterprise Solutions',
		'budgetHours' => 350,
		'actualHours' => 150,
		'availableHours' => 200,
		'assignedHours' => 150,
	],
]);

$mockVAData = [
	[
		'id' => '1',
		'name' => 'Aguinaldo, John Francis',
		'role' => 'Virtual Assistant',
		'dailyHours' => [5 => 8, 12 => 8, 19 => 8, 26 => 8, 27 => 8, 28 => 12.52],
		'total' => 44.52,
	],
	[
		'id' => '2',
		'name' => 'Claridad, Racel',
		'role' => 'Virtual Assistant',
		'dailyHours' => [3 => 2.35],
		'total' => 2.35,
	],
	[
		'id' => '3',
		'name' => 'Maderia, Maria Nescilla',
		'role' => 'Virtual Assistant',
		'dailyHours' => [8 => 8, 15 => 9.17],
		'total' => 17.17,
	],
	[
		'id' => '4',
		'name' => 'Mercado, Jerico',
		'role' => 'Virtual Assistant',
		'dailyHours' => [10 => 8],
		'total' => 8.00,
	],
	[
		'id' => '5',
		'name' => 'Sarmiento, Juniel Zigs',
		'role' => 'Virtual Assistant',
		'dailyHours' => [1 => 1.00],
		'total' => 1.00,
	],
];

$months = [
	'January', 'February', 'March', 'April', 'May', 'June',
	'July', 'August', 'September', 'October', 'November', 'December',
];

$currentYear = (int) date('Y');
$years = [];
for ($yearOffset = -2; $yearOffset <= 2; $yearOffset++) {
	$years[] = $currentYear + $yearOffset;
}

$totalVAs = count($mockVAData);
$totalHours = array_reduce(
	$mockVAData,
	static fn(float $sum, array $va): float => $sum + (float) ($va['total'] ?? 0),
	0.0
);
$billableHours = $totalHours * 0.85;
$nonBillableHours = $totalHours * 0.15;

$mockAccountData = [

	[
		'id' => '2',
		'accountName' => 'Virtual BizNest (In-house Tasks)',
		'dailyHours' => [
			1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0, 6 => 0, 7 => 0, 8 => 0, 9 => 0, 10 => 0,
			11 => 0, 12 => 0, 13 => 0, 14 => 0, 15 => 0, 16 => 0, 17 => 0, 18 => 0, 19 => 0, 20 => 0,
			21 => 0, 22 => 0, 23 => 0, 24 => 0, 25 => 0, 26 => 0, 27 => 0, 28 => 0, 29 => 0, 30 => 0, 31 => 0,
		],
		'total' => 33.00,
	],
	[
		'id' => '3',
		'accountName' => 'JackPine Accounts',
		'dailyHours' => [5 => 8, 12 => 9.5, 19 => 7.5, 26 => 8],
		'total' => 33.00,
	],
	[
		'id' => '4',
		'accountName' => 'NRD Consultants',
		'dailyHours' => [3 => 4, 8 => 8, 15 => 9.17, 22 => 6.5],
		'total' => 27.67,
	],
	[
		'id' => '5',
		'accountName' => 'Chicago Northshore Moms',
		'dailyHours' => [7 => 5, 14 => 6.5, 21 => 7, 28 => 4.5],
		'total' => 23.00,
	],
	[
		'id' => '6',
		'accountName' => 'Personal Tasks - Dean McCarthy',
		'dailyHours' => [2 => 3, 9 => 5, 16 => 4, 23 => 6, 30 => 2.5],
		'total' => 20.50,
	],
];

$accountTypes = [
	'All Accounts',
	'VBN Accounts',
	'JackPine Accounts',
	'Other Accounts',
];

$totalAccounts = 5;
$totalHoursThisMonth = 137.17;
$highestAccount = [
	'id' => '2',
	'accountName' => 'Virtual BizNest (In-house Tasks)',
	'dailyHours' => [
		1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0, 6 => 0, 7 => 0, 8 => 0, 9 => 0, 10 => 0,
		11 => 0, 12 => 0, 13 => 0, 14 => 0, 15 => 0, 16 => 0, 17 => 0, 18 => 0, 19 => 0, 20 => 0,
		21 => 0, 22 => 0, 23 => 0, 24 => 0, 25 => 0, 26 => 0, 27 => 0, 28 => 0, 29 => 0, 30 => 0, 31 => 0,
	],
	'total' => 33.00,
];
$averageDailyConsumption = 4.42;
