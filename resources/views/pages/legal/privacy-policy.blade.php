@extends('layouts.app')

@section('title', 'Privacy Policy | EINOVATECH')
@section('meta_description', 'EINOVATECH privacy policy outlining how we collect, use, protect, and manage your personal information and data.')
@section('meta_keywords', 'EINOVATECH privacy policy, data protection, personal information, GDPR, data privacy')
@section('og_title', 'Privacy Policy | EINOVATECH')
@section('og_description', 'Read our privacy policy to understand how EINOVATECH collects, uses, and protects your personal data.')

@section('head')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "WebPage",
    "name": "Privacy Policy",
    "description": "EINOVATECH privacy policy outlining how we collect, use, protect, and manage your personal information and data.",
    "url": "{{ url('/privacy-policy') }}",
    "publisher": {
        "@type": "Organization",
        "name": "EINOVATECH",
        "url": "https://einovatech.com"
    },
    "breadcrumb": {
        "@type": "BreadcrumbList",
        "itemListElement": [
            { "@type": "ListItem", "position": 1, "name": "Home", "item": "{{ url('/') }}" },
            { "@type": "ListItem", "position": 2, "name": "Privacy Policy", "item": "{{ url('/privacy-policy') }}" }
        ]
    }
}
</script>
@endsection

@section('content')

<!-- Hero Section -->
<section class="bg-gradient-to-br from-slate-50 to-indigo-50 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-slate-900 mb-6">
                Privacy Policy
            </h1>
            <p class="text-xl text-slate-600 max-w-3xl mx-auto">
                Last Updated: November 30, 2024
            </p>
        </div>
    </div>
</section>

<!-- Privacy Policy Content -->
<section class="py-16 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Introduction -->
        <div class="mb-12">
            <h2 class="text-3xl font-bold text-slate-900 mb-4">Introduction</h2>
            <p class="text-lg text-slate-600 mb-4">
                Einovatech Infosystems Private Limited ("EINOVATECH", "we", "us", or "our") is committed to protecting your privacy. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you visit our website <a href="https://einovatech.com" class="text-blue-600 hover:underline">einovatech.com</a> or use our services.
            </p>
            <p class="text-lg text-slate-600">
                Please read this privacy policy carefully. If you do not agree with the terms of this privacy policy, please do not access the site or use our services.
            </p>
        </div>

        <!-- Information We Collect -->
        <div class="mb-12">
            <h2 class="text-3xl font-bold text-slate-900 mb-4">Information We Collect</h2>
            
            <h3 class="text-xl font-semibold text-slate-900 mb-3 mt-6">Personal Information</h3>
            <p class="text-slate-600 mb-4">
                We may collect personal information that you provide to us such as:
            </p>
            <ul class="list-disc pl-6 text-slate-600 space-y-2 mb-6">
                <li>Name, email address, phone number</li>
                <li>Company name and job title</li>
                <li>Billing and payment information</li>
                <li>Communication preferences</li>
                <li>Information provided in forms, surveys, or feedback</li>
            </ul>

            <h3 class="text-xl font-semibold text-slate-900 mb-3 mt-6">Automatically Collected Information</h3>
            <p class="text-slate-600 mb-4">
                When you visit our website, we automatically collect certain information about your device, including:
            </p>
            <ul class="list-disc pl-6 text-slate-600 space-y-2">
                <li>IP address and browser type</li>
                <li>Operating system and device information</li>
                <li>Pages visited and time spent on pages</li>
                <li>Referring website addresses</li>
                <li>Cookies and similar tracking technologies</li>
            </ul>
        </div>

        <!-- How We Use Your Information -->
        <div class="mb-12">
            <h2 class="text-3xl font-bold text-slate-900 mb-4">How We Use Your Information</h2>
            <p class="text-slate-600 mb-4">
                We use the information we collect to:
            </p>
            <ul class="list-disc pl-6 text-slate-600 space-y-2">
                <li>Provide, operate, and maintain our services</li>
                <li>Process your transactions and send related information</li>
                <li>Respond to your inquiries and provide customer support</li>
                <li>Send you technical notices and support messages</li>
                <li>Communicate about products, services, and events</li>
                <li>Monitor and analyze trends, usage, and activities</li>
                <li>Detect, prevent, and address technical issues and security</li>
                <li>Improve our website and develop new features</li>
                <li>Comply with legal obligations</li>
            </ul>
        </div>

        <!-- Data Sharing and Disclosure -->
        <div class="mb-12">
            <h2 class="text-3xl font-bold text-slate-900 mb-4">Data Sharing and Disclosure</h2>
            <p class="text-slate-600 mb-4">
                We may share your information in the following situations:
            </p>
            <ul class="list-disc pl-6 text-slate-600 space-y-2">
                <li><strong>Service Providers:</strong> We may share information with third-party vendors who perform services on our behalf</li>
                <li><strong>Business Transfers:</strong> In connection with any merger, sale of company assets, or acquisition</li>
                <li><strong>Legal Requirements:</strong> When required by law or to protect our rights</li>
                <li><strong>With Your Consent:</strong> We may disclose your information with your permission</li>
            </ul>
            <p class="text-slate-600 mt-4">
                We do not sell your personal information to third parties.
            </p>
        </div>

        <!-- Data Security -->
        <div class="mb-12">
            <h2 class="text-3xl font-bold text-slate-900 mb-4">Data Security</h2>
            <p class="text-slate-600 mb-4">
                We implement appropriate technical and organizational security measures to protect your personal information, including:
            </p>
            <ul class="list-disc pl-6 text-slate-600 space-y-2">
                <li>Encryption of data in transit and at rest</li>
                <li>Regular security assessments and audits</li>
                <li>Access controls and authentication mechanisms</li>
                <li>Employee training on data protection</li>
                <li>Incident response procedures</li>
            </ul>
            <p class="text-slate-600 mt-4">
                However, no method of transmission over the Internet is 100% secure, and we cannot guarantee absolute security.
            </p>
        </div>

        <!-- Data Retention -->
        <div class="mb-12">
            <h2 class="text-3xl font-bold text-slate-900 mb-4">Data Retention</h2>
            <p class="text-slate-600">
                We retain your personal information for as long as necessary to fulfill the purposes outlined in this Privacy Policy, unless a longer retention period is required by law. When we no longer need your information, we will securely delete or anonymize it.
            </p>
        </div>

        <!-- Your Rights -->
        <div class="mb-12">
            <h2 class="text-3xl font-bold text-slate-900 mb-4">Your Rights</h2>
            <p class="text-slate-600 mb-4">
                Depending on your location, you may have certain rights regarding your personal information:
            </p>
            <ul class="list-disc pl-6 text-slate-600 space-y-2">
                <li><strong>Access:</strong> Request access to your personal information</li>
                <li><strong>Correction:</strong> Request correction of inaccurate information</li>
                <li><strong>Deletion:</strong> Request deletion of your personal information</li>
                <li><strong>Restriction:</strong> Request restriction of processing</li>
                <li><strong>Portability:</strong> Request transfer of your data</li>
                <li><strong>Objection:</strong> Object to processing of your information</li>
                <li><strong>Withdraw Consent:</strong> Withdraw consent at any time</li>
            </ul>
            <p class="text-slate-600 mt-4">
                To exercise these rights, please contact us at <a href="mailto:privacy@einovatech.com" class="text-blue-600 hover:underline">privacy@einovatech.com</a>
            </p>
        </div>

        <!-- Cookies and Tracking -->
        <div class="mb-12">
            <h2 class="text-3xl font-bold text-slate-900 mb-4">Cookies and Tracking Technologies</h2>
            <p class="text-slate-600 mb-4">
                We use cookies and similar tracking technologies to track activity on our website and store certain information. You can instruct your browser to refuse all cookies or to indicate when a cookie is being sent. However, if you do not accept cookies, you may not be able to use some portions of our website.
            </p>
        </div>

        <!-- Third-Party Links -->
        <div class="mb-12">
            <h2 class="text-3xl font-bold text-slate-900 mb-4">Third-Party Links</h2>
            <p class="text-slate-600">
                Our website may contain links to third-party websites. We are not responsible for the privacy practices or content of these third-party sites. We encourage you to read the privacy policies of any third-party sites you visit.
            </p>
        </div>

        <!-- Children's Privacy -->
        <div class="mb-12">
            <h2 class="text-3xl font-bold text-slate-900 mb-4">Children's Privacy</h2>
            <p class="text-slate-600">
                Our services are not directed to individuals under the age of 18. We do not knowingly collect personal information from children. If you are a parent or guardian and believe your child has provided us with personal information, please contact us.
            </p>
        </div>

        <!-- International Transfers -->
        <div class="mb-12">
            <h2 class="text-3xl font-bold text-slate-900 mb-4">International Data Transfers</h2>
            <p class="text-slate-600">
                Your information may be transferred to and maintained on computers located outside of your state, province, country, or other governmental jurisdiction where data protection laws may differ. We take appropriate safeguards to ensure your data is treated securely and in accordance with this Privacy Policy.
            </p>
        </div>

        <!-- Changes to Privacy Policy -->
        <div class="mb-12">
            <h2 class="text-3xl font-bold text-slate-900 mb-4">Changes to This Privacy Policy</h2>
            <p class="text-slate-600">
                We may update our Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page and updating the "Last Updated" date. You are advised to review this Privacy Policy periodically for any changes.
            </p>
        </div>

        <!-- Contact Information -->
        <div class="mb-12">
            <h2 class="text-3xl font-bold text-slate-900 mb-4">Contact Us</h2>
            <p class="text-slate-600 mb-4">
                If you have any questions about this Privacy Policy, please contact us:
            </p>
            <div class="bg-slate-50 rounded-lg p-6">
                <p class="text-slate-700 mb-2"><strong>Einovatech Infosystems Private Limited</strong></p>
                <p class="text-slate-600 mb-1">Email: <a href="mailto:privacy@einovatech.com" class="text-blue-600 hover:underline">privacy@einovatech.com</a></p>
                <p class="text-slate-600 mb-1">Phone: <a href="tel:+919243077840" class="text-blue-600 hover:underline">+91 92430 77840</a></p>
                <p class="text-slate-600 mb-1">Address: Office No 315, 3rd Floor, Bhanwar Kuwa, Indore, Madhya Pradesh, India - 452014</p>
                <p class="text-slate-600 mb-1">CIN: U62091MP2024PTC073760</p>
                <p class="text-slate-600">GST: 23AAHCH6362C1ZV</p>
            </div>
        </div>

        <!-- Compliance -->
        <div class="bg-blue-50 border-l-4 border-blue-600 p-6 rounded-lg">
            <h3 class="text-lg font-semibold text-blue-900 mb-2">Regulatory Compliance</h3>
            <p class="text-blue-800">
                This Privacy Policy complies with the Information Technology Act, 2000 and the Information Technology (Reasonable Security Practices and Procedures and Sensitive Personal Data or Information) Rules, 2011 of India, as well as international data protection standards including GDPR principles.
            </p>
        </div>

    </div>
</section>

@endsection
