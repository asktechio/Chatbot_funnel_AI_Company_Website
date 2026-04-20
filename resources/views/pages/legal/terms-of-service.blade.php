@extends('layouts.app')

@section('title', 'Terms of Service | HYLUMINIX')
@section('meta_description', 'HYLUMINIX terms of service outlining the rules and regulations for the use of our website and services.')
@section('meta_keywords', 'HYLUMINIX terms of service, terms and conditions, service agreement, legal terms')
@section('og_title', 'Terms of Service | HYLUMINIX')
@section('og_description', 'Read the terms of service governing your use of HYLUMINIX products and services.')

@section('head')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "WebPage",
    "name": "Terms of Service",
    "description": "HYLUMINIX terms of service outlining the rules and regulations for the use of our website and services.",
    "url": "{{ url('/terms-of-service') }}",
    "publisher": {
        "@type": "Organization",
        "name": "HYLUMINIX",
        "url": "https://hyluminix.com"
    },
    "breadcrumb": {
        "@type": "BreadcrumbList",
        "itemListElement": [
            { "@type": "ListItem", "position": 1, "name": "Home", "item": "{{ url('/') }}" },
            { "@type": "ListItem", "position": 2, "name": "Terms of Service", "item": "{{ url('/terms-of-service') }}" }
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
                Terms of Service
            </h1>
            <p class="text-xl text-slate-600 max-w-3xl mx-auto">
                Last Updated: November 30, 2024
            </p>
        </div>
    </div>
</section>

<!-- Terms of Service Content -->
<section class="py-16 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Introduction -->
        <div class="mb-12">
            <h2 class="text-3xl font-bold text-slate-900 mb-4">Agreement to Terms</h2>
            <p class="text-lg text-slate-600 mb-4">
                These Terms of Service ("Terms", "Agreement") are a legal agreement between you and Hyluminix Infosystems Private Limited ("HYLUMINIX", "Company", "we", "us", or "our") governing your use of our website <a href="https://hyluminix.com" class="text-blue-600 hover:underline">hyluminix.com</a> and related services.
            </p>
            <p class="text-lg text-slate-600">
                By accessing or using our services, you agree to be bound by these Terms. If you disagree with any part of the terms, you may not access our services.
            </p>
        </div>

        <!-- Company Information -->
        <div class="mb-12">
            <h2 class="text-3xl font-bold text-slate-900 mb-4">Company Information</h2>
            <div class="bg-slate-50 rounded-lg p-6">
                <p class="text-slate-700 mb-2"><strong>Hyluminix Infosystems Private Limited</strong></p>
                <p class="text-slate-600 mb-1">CIN: U62091MP2024PTC073760</p>
                <p class="text-slate-600 mb-1">GST: 23AAHCH6362C1ZV</p>
                <p class="text-slate-600 mb-1">Address: Office No 315, 3rd Floor, Bhanwar Kuwa, Indore, Madhya Pradesh, India - 452014</p>
                <p class="text-slate-600 mb-1">Email: <a href="mailto:info@hyluminix.com" class="text-blue-600 hover:underline">info@hyluminix.com</a></p>
                <p class="text-slate-600">Phone: <a href="tel:+919243077840" class="text-blue-600 hover:underline">+91 92430 77840</a></p>
            </div>
        </div>

        <!-- Services Description -->
        <div class="mb-12">
            <h2 class="text-3xl font-bold text-slate-900 mb-4">Services Description</h2>
            <p class="text-slate-600 mb-4">
                HYLUMINIX provides professional software development and IT consulting services, including but not limited to:
            </p>
            <ul class="list-disc pl-6 text-slate-600 space-y-2">
                <li>Custom software development</li>
                <li>Cloud computing solutions</li>
                <li>System integration services</li>
                <li>Cybersecurity consulting</li>
                <li>Data analytics and AI/ML solutions</li>
                <li>Quality assurance and testing</li>
                <li>Staff augmentation and recruitment</li>
            </ul>
        </div>

        <!-- User Obligations -->
        <div class="mb-12">
            <h2 class="text-3xl font-bold text-slate-900 mb-4">User Obligations</h2>
            <p class="text-slate-600 mb-4">
                By using our services, you agree to:
            </p>
            <ul class="list-disc pl-6 text-slate-600 space-y-2">
                <li>Provide accurate and complete information</li>
                <li>Maintain the security of your account credentials</li>
                <li>Notify us immediately of any unauthorized access</li>
                <li>Use our services only for lawful purposes</li>
                <li>Not engage in any activity that disrupts or interferes with our services</li>
                <li>Not attempt to gain unauthorized access to our systems</li>
                <li>Comply with all applicable laws and regulations</li>
                <li>Respect intellectual property rights</li>
            </ul>
        </div>

        <!-- Intellectual Property -->
        <div class="mb-12">
            <h2 class="text-3xl font-bold text-slate-900 mb-4">Intellectual Property Rights</h2>
            <p class="text-slate-600 mb-4">
                The website and its original content, features, and functionality are owned by HYLUMINIX and are protected by international copyright, trademark, patent, trade secret, and other intellectual property laws.
            </p>
            <h3 class="text-xl font-semibold text-slate-900 mb-3 mt-6">Your Content</h3>
            <p class="text-slate-600 mb-4">
                You retain ownership of any content you submit to us. By submitting content, you grant us a worldwide, non-exclusive, royalty-free license to use, reproduce, modify, and distribute your content in connection with providing our services.
            </p>
            <h3 class="text-xl font-semibold text-slate-900 mb-3 mt-6">Deliverables</h3>
            <p class="text-slate-600">
                Ownership of deliverables and intellectual property created during project engagements will be governed by specific project agreements and contracts.
            </p>
        </div>

        <!-- Payment Terms -->
        <div class="mb-12">
            <h2 class="text-3xl font-bold text-slate-900 mb-4">Payment Terms</h2>
            <p class="text-slate-600 mb-4">
                Payment terms for professional services will be specified in individual project agreements. General terms include:
            </p>
            <ul class="list-disc pl-6 text-slate-600 space-y-2">
                <li>Payments are due as per agreed milestones or schedules</li>
                <li>All fees are quoted in Indian Rupees (INR) unless otherwise specified</li>
                <li>Applicable taxes (GST) will be added to invoices</li>
                <li>Late payments may incur interest charges</li>
                <li>We reserve the right to suspend services for non-payment</li>
            </ul>
        </div>

        <!-- Service Level Agreement -->
        <div class="mb-12">
            <h2 class="text-3xl font-bold text-slate-900 mb-4">Service Level Agreement</h2>
            <p class="text-slate-600 mb-4">
                Service level commitments, including availability, response times, and support will be defined in specific Service Level Agreements (SLAs) for each project or engagement.
            </p>
        </div>

        <!-- Confidentiality -->
        <div class="mb-12">
            <h2 class="text-3xl font-bold text-slate-900 mb-4">Confidentiality</h2>
            <p class="text-slate-600 mb-4">
                Both parties agree to:
            </p>
            <ul class="list-disc pl-6 text-slate-600 space-y-2">
                <li>Maintain confidentiality of proprietary information</li>
                <li>Use confidential information only for agreed purposes</li>
                <li>Not disclose confidential information to third parties without consent</li>
                <li>Return or destroy confidential information upon request</li>
            </ul>
        </div>

        <!-- Warranties and Disclaimers -->
        <div class="mb-12">
            <h2 class="text-3xl font-bold text-slate-900 mb-4">Warranties and Disclaimers</h2>
            <h3 class="text-xl font-semibold text-slate-900 mb-3 mt-6">Our Warranties</h3>
            <p class="text-slate-600 mb-4">
                We warrant that:
            </p>
            <ul class="list-disc pl-6 text-slate-600 space-y-2 mb-6">
                <li>Services will be performed with professional care and skill</li>
                <li>We have the necessary expertise to deliver the services</li>
                <li>Services will substantially conform to agreed specifications</li>
            </ul>

            <h3 class="text-xl font-semibold text-slate-900 mb-3 mt-6">Disclaimers</h3>
            <p class="text-slate-600 mb-4">
                Except as expressly stated, our services are provided "as is" without warranties of any kind, either express or implied, including but not limited to:
            </p>
            <ul class="list-disc pl-6 text-slate-600 space-y-2">
                <li>Implied warranties of merchantability</li>
                <li>Fitness for a particular purpose</li>
                <li>Non-infringement</li>
                <li>Uninterrupted or error-free operation</li>
            </ul>
        </div>

        <!-- Limitation of Liability -->
        <div class="mb-12">
            <h2 class="text-3xl font-bold text-slate-900 mb-4">Limitation of Liability</h2>
            <p class="text-slate-600 mb-4">
                To the maximum extent permitted by law, HYLUMINIX shall not be liable for:
            </p>
            <ul class="list-disc pl-6 text-slate-600 space-y-2">
                <li>Indirect, incidental, special, consequential, or punitive damages</li>
                <li>Loss of profits, revenue, data, or business opportunities</li>
                <li>Service interruptions or delays</li>
                <li>Third-party actions or content</li>
            </ul>
            <p class="text-slate-600 mt-4">
                Our total liability shall not exceed the fees paid by you for the specific service giving rise to the claim in the 12 months preceding the claim.
            </p>
        </div>

        <!-- Indemnification -->
        <div class="mb-12">
            <h2 class="text-3xl font-bold text-slate-900 mb-4">Indemnification</h2>
            <p class="text-slate-600">
                You agree to indemnify and hold HYLUMINIX harmless from any claims, damages, losses, liabilities, and expenses (including legal fees) arising from your use of our services, violation of these Terms, or infringement of any third-party rights.
            </p>
        </div>

        <!-- Termination -->
        <div class="mb-12">
            <h2 class="text-3xl font-bold text-slate-900 mb-4">Termination</h2>
            <p class="text-slate-600 mb-4">
                We may terminate or suspend access to our services immediately, without prior notice or liability, for any reason, including:
            </p>
            <ul class="list-disc pl-6 text-slate-600 space-y-2">
                <li>Breach of these Terms</li>
                <li>Non-payment of fees</li>
                <li>Fraudulent or illegal activities</li>
                <li>At our discretion for business reasons</li>
            </ul>
            <p class="text-slate-600 mt-4">
                Upon termination, your right to use the services will immediately cease. Provisions that by their nature should survive termination shall survive.
            </p>
        </div>

        <!-- Governing Law -->
        <div class="mb-12">
            <h2 class="text-3xl font-bold text-slate-900 mb-4">Governing Law and Jurisdiction</h2>
            <p class="text-slate-600">
                These Terms shall be governed by and construed in accordance with the laws of India. Any disputes arising from these Terms or use of our services shall be subject to the exclusive jurisdiction of the courts in Indore, Madhya Pradesh, India.
            </p>
        </div>

        <!-- Dispute Resolution -->
        <div class="mb-12">
            <h2 class="text-3xl font-bold text-slate-900 mb-4">Dispute Resolution</h2>
            <p class="text-slate-600 mb-4">
                In the event of any dispute, both parties agree to:
            </p>
            <ol class="list-decimal pl-6 text-slate-600 space-y-2">
                <li>Attempt to resolve the dispute through good-faith negotiations</li>
                <li>If negotiations fail, engage in mediation before pursuing legal action</li>
                <li>Arbitration may be pursued as per the Arbitration and Conciliation Act, 1996</li>
            </ol>
        </div>

        <!-- Force Majeure -->
        <div class="mb-12">
            <h2 class="text-3xl font-bold text-slate-900 mb-4">Force Majeure</h2>
            <p class="text-slate-600">
                Neither party shall be liable for any failure or delay in performance due to circumstances beyond their reasonable control, including but not limited to acts of God, war, terrorism, civil unrest, labor disputes, pandemics, or government actions.
            </p>
        </div>

        <!-- Changes to Terms -->
        <div class="mb-12">
            <h2 class="text-3xl font-bold text-slate-900 mb-4">Changes to Terms</h2>
            <p class="text-slate-600">
                We reserve the right to modify these Terms at any time. We will notify users of material changes by posting the updated Terms on this page with a new "Last Updated" date. Your continued use of our services after changes constitutes acceptance of the modified Terms.
            </p>
        </div>

        <!-- Severability -->
        <div class="mb-12">
            <h2 class="text-3xl font-bold text-slate-900 mb-4">Severability</h2>
            <p class="text-slate-600">
                If any provision of these Terms is found to be unenforceable or invalid, that provision shall be limited or eliminated to the minimum extent necessary, and the remaining provisions shall remain in full force and effect.
            </p>
        </div>

        <!-- Entire Agreement -->
        <div class="mb-12">
            <h2 class="text-3xl font-bold text-slate-900 mb-4">Entire Agreement</h2>
            <p class="text-slate-600">
                These Terms, together with our Privacy Policy and any specific project agreements, constitute the entire agreement between you and HYLUMINIX regarding use of our services, superseding any prior agreements.
            </p>
        </div>

        <!-- Contact Information -->
        <div class="mb-12">
            <h2 class="text-3xl font-bold text-slate-900 mb-4">Contact Us</h2>
            <p class="text-slate-600 mb-4">
                If you have any questions about these Terms of Service, please contact us:
            </p>
            <div class="bg-slate-50 rounded-lg p-6">
                <p class="text-slate-700 mb-2"><strong>Hyluminix Infosystems Private Limited</strong></p>
                <p class="text-slate-600 mb-1">Email: <a href="mailto:legal@hyluminix.com" class="text-blue-600 hover:underline">legal@hyluminix.com</a></p>
                <p class="text-slate-600 mb-1">Phone: <a href="tel:+919243077840" class="text-blue-600 hover:underline">+91 92430 77840</a></p>
                <p class="text-slate-600 mb-1">Address: Office No 315, 3rd Floor, Bhanwar Kuwa, Indore, Madhya Pradesh, India - 452014</p>
                <p class="text-slate-600 mb-1">CIN: U62091MP2024PTC073760</p>
                <p class="text-slate-600">GST: 23AAHCH6362C1ZV</p>
            </div>
        </div>

        <!-- Acceptance -->
        <div class="bg-blue-50 border-l-4 border-blue-600 p-6 rounded-lg">
            <h3 class="text-lg font-semibold text-blue-900 mb-2">Acceptance of Terms</h3>
            <p class="text-blue-800">
                By using our services, you acknowledge that you have read, understood, and agree to be bound by these Terms of Service and our Privacy Policy. If you are entering into this agreement on behalf of a company or organization, you represent that you have the authority to bind such entity to these terms.
            </p>
        </div>

    </div>
</section>

@endsection
