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
		'approvedBy' => 'Sarah Mitchell',
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
		'approvedBy' => 'Sarah Mitchell',
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
		'approvedBy' => 'Michael Chen',
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
		'approvedBy' => 'Amanda Rodriguez',
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
		'approvedBy' => 'Sarah Mitchell',
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
