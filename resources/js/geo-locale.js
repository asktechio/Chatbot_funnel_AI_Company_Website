/**
 * Geo-Locale Module — Country-Aware Content System
 * ─────────────────────────────────────────────────
 * Detects visitor's country via IP geolocation and provides
 * region-specific content for the chatbot funnel (currency,
 * example names, business types, chat demos, pricing).
 *
 * Usage in Alpine components:
 *   $store.geo.currency        → '₹' | '$' | '£' | 'AED ' | '€'
 *   $store.geo.country         → 'IN' | 'US' | 'GB' | 'AE' | ...
 *   $store.geo.region          → 'in' | 'us' | 'gb' | 'ae' | 'sg' | 'intl'
 *   $store.geo.conversations   → Array of chat demo conversations
 *   $store.geo.bookings        → CRM dashboard demo bookings
 *   $store.geo.whatsappNumber  → WhatsApp contact number
 *   $store.geo.phone           → Display phone number
 */

import Alpine from 'alpinejs';

/* ═══════════════════════════════════════════════════
   REGION CONTENT CONFIGURATIONS
   ═══════════════════════════════════════════════════ */

const REGIONS = {

    /* ── India (Default / Primary Market) ── */
    in: {
        country: 'IN',
        region: 'in',
        currency: '₹',
        currencyCode: 'INR',
        phone: '+91 70675 39685',
        whatsappNumber: '919243077840',
        locale: 'en-IN',
        tagline: 'Enterprise-grade automation built for Indian businesses.',
        conversations: [
            [
                { sender: 'user', text: 'Hi, I need to book a dental checkup', time: '10:32 PM', typingPreview: 'Hi, I need to book a dental checkup' },
                { sender: 'bot',  text: 'Hello! 👋 Welcome to <strong>SmileCare Dental</strong>. I can help you book right away!<br><br>Which service do you need?<br>1️⃣ General Checkup — ₹500<br>2️⃣ Teeth Cleaning — ₹1,500<br>3️⃣ Root Canal — ₹5,000', time: '10:32 PM' },
                { sender: 'user', text: 'General checkup please', time: '10:33 PM', typingPreview: 'General checkup please' },
                { sender: 'bot',  text: '📅 Available slots for <strong>tomorrow (Mar 4)</strong>:<br><br>◾ 10:00 AM — Dr. Sharma<br>◾ 11:30 AM — Dr. Sharma<br>◾ 2:00 PM — Dr. Patel<br>◾ 4:30 PM — Dr. Patel<br><br>Which time suits you?', time: '10:33 PM' },
                { sender: 'user', text: '11:30 AM with Dr. Sharma', time: '10:33 PM', typingPreview: '11:30 AM with Dr. Sharma' },
                { sender: 'bot',  text: '✅ <strong>Booking Confirmed!</strong><br><br>📋 General Checkup<br>👨‍⚕️ Dr. Sharma<br>📅 Mar 4 • 11:30 AM<br>📍 SmileCare Dental, MG Road<br>💰 ₹500<br><br>You\'ll get a reminder <strong>1 hour before</strong>. See you tomorrow! 😊', time: '10:34 PM' },
            ],
            [
                { sender: 'user', text: 'Hi, can I book a haircut for today?', time: '2:15 PM', typingPreview: 'Hi, can I book a haircut for today?' },
                { sender: 'bot',  text: 'Hey there! 💇 Welcome to <strong>GlowUp Salon</strong>.<br><br>Slots available <strong>today</strong>:<br>◾ 3:30 PM — Riya<br>◾ 5:00 PM — Ankit<br>◾ 6:30 PM — Riya<br><br>Who would you prefer?', time: '2:15 PM' },
                { sender: 'user', text: '5 PM with Ankit', time: '2:16 PM', typingPreview: '5 PM with Ankit' },
                { sender: 'bot',  text: 'Great choice! 🌟 Ankit is our top stylist.<br><br>Add-ons?<br>🧴 Hair Spa — ₹800 (combo saves ₹200)<br>💆 Head Massage — ₹300<br><br>Or just haircut at <strong>₹400</strong>?', time: '2:16 PM' },
                { sender: 'user', text: 'Add the hair spa combo', time: '2:17 PM', typingPreview: 'Add the hair spa combo' },
                { sender: 'bot',  text: '✅ <strong>Booked!</strong><br><br>💇 Haircut + Hair Spa<br>Stylist: Ankit | Today 5:00 PM<br>💰 ₹1,200 (saved ₹200!)<br><br>See you at GlowUp! 💫', time: '2:17 PM' },
            ],
            [
                { sender: 'user', text: 'I have been having back pain, need to see a doctor', time: '11:45 PM', typingPreview: 'I have been having back pain, need to see a doctor' },
                { sender: 'bot',  text: 'I\'m sorry to hear that 🏥 Let me help find the right specialist.<br><br>How long have you had the pain?<br>1️⃣ Less than a week<br>2️⃣ 1–4 weeks<br>3️⃣ More than a month', time: '11:45 PM' },
                { sender: 'user', text: 'About 2 weeks now', time: '11:46 PM', typingPreview: 'About 2 weeks now' },
                { sender: 'bot',  text: 'I\'d recommend <strong>Dr. Mehta (Orthopedic)</strong>.<br><br>Earliest: <strong>Tomorrow 10:00 AM</strong><br>Consultation: ₹800<br><br>Shall I confirm this booking?', time: '11:46 PM' },
                { sender: 'user', text: 'Yes please book it', time: '11:47 PM', typingPreview: 'Yes please book it' },
                { sender: 'bot',  text: '✅ <strong>Appointment Confirmed!</strong><br><br>👨‍⚕️ Dr. Mehta — Orthopedic<br>📅 Tomorrow • 10:00 AM<br>📍 HealthFirst Clinic, Bandra<br>💰 ₹800<br><br>⚡ Reminder 1 hour before. Get well soon! 🙏', time: '11:47 PM' },
            ],
        ],
        bookings: [
            { id:1, name:'Priya Sharma',  initials:'PS', phone:'+91 98765 43210', service:'General Checkup',  date:'Mar 3', time:'11:30 AM', source:'WhatsApp', sourceIcon:'💬', sourceClass:'bg-green-500/10 text-green-400 border border-green-500/20', amount:500,  status:'Confirmed', statusClass:'bg-green-500/10 text-green-400', statusDot:'bg-green-400', avatarBg:'bg-purple-600', isNew:false },
            { id:2, name:'Rahul Verma',   initials:'RV', phone:'+91 87654 32109', service:'Teeth Cleaning',   date:'Mar 3', time:'2:00 PM',  source:'WhatsApp', sourceIcon:'💬', sourceClass:'bg-green-500/10 text-green-400 border border-green-500/20', amount:1500, status:'Confirmed', statusClass:'bg-green-500/10 text-green-400', statusDot:'bg-green-400', avatarBg:'bg-blue-600',   isNew:false },
            { id:3, name:'Anita Desai',   initials:'AD', phone:'+91 76543 21098', service:'Root Canal',       date:'Mar 3', time:'3:30 PM',  source:'Google Ads', sourceIcon:'🔍', sourceClass:'bg-blue-500/10 text-blue-400 border border-blue-500/20',    amount:5000, status:'Pending',   statusClass:'bg-yellow-500/10 text-yellow-400', statusDot:'bg-yellow-400', avatarBg:'bg-rose-600',   isNew:false },
            { id:4, name:'Vikram Singh',  initials:'VS', phone:'+91 65432 10987', service:'Consultation',     date:'Mar 3', time:'4:30 PM',  source:'WhatsApp', sourceIcon:'💬', sourceClass:'bg-green-500/10 text-green-400 border border-green-500/20', amount:800,  status:'Confirmed', statusClass:'bg-green-500/10 text-green-400', statusDot:'bg-green-400', avatarBg:'bg-indigo-600', isNew:false },
            { id:5, name:'Meera Patel',   initials:'MP', phone:'+91 54321 09876', service:'Teeth Whitening',  date:'Mar 3', time:'5:00 PM',  source:'WhatsApp', sourceIcon:'💬', sourceClass:'bg-green-500/10 text-green-400 border border-green-500/20', amount:8000, status:'Confirmed', statusClass:'bg-green-500/10 text-green-400', statusDot:'bg-green-400', avatarBg:'bg-emerald-600',isNew:true  },
            { id:6, name:'Arjun Reddy',   initials:'AR', phone:'+91 43210 98765', service:'General Checkup',  date:'Mar 4', time:'10:00 AM', source:'Instagram', sourceIcon:'📸', sourceClass:'bg-pink-500/10 text-pink-400 border border-pink-500/20',    amount:500,  status:'New',       statusClass:'bg-cyan-500/10 text-cyan-400',    statusDot:'bg-cyan-400',   avatarBg:'bg-orange-600', isNew:true  },
        ],
        lossCalc: {
            defaultValue: 2000,
            minLabel: '₹500',
            maxLabel: '₹50K',
            min: 500,
            max: 50000,
            step: 500,
            missedLabel: 'Average value per customer (₹)',
            roiMessages: {
                low:  (type) => `A ${type} missing ~30% of ~5 daily enquiries could lose ₹9K–₹30K/month. Our AI recovers most of that — automatically.`,
                mid:  (type) => `A ${type} getting ~20 enquiries/day and missing 30% could lose ₹36K–₹1.2L/month. Our AI handles all of them, 24/7.`,
                high: (type) => `At ~60 enquiries/day, missing 30% in a ${type} business could cost ₹1L–₹4L/month. Our AI literally pays for itself in the first week.`,
                max:  (type) => `At 100+ enquiries/day, even a 10% miss rate in ${type} costs lakhs monthly. Our AI closes that gap immediately.`,
            },
        },
    },

    /* ── United States ── */
    us: {
        country: 'US',
        region: 'us',
        currency: '$',
        currencyCode: 'USD',
        phone: '+1 (650) 555-0190',
        whatsappNumber: '919243077840',
        locale: 'en-US',
        tagline: 'AI-powered automation built for American businesses.',
        conversations: [
            [
                { sender: 'user', text: 'Hi, I need to schedule a dental cleaning', time: '3:15 PM', typingPreview: 'Hi, I need to schedule a dental cleaning' },
                { sender: 'bot',  text: 'Hello! 👋 Welcome to <strong>BrightSmile Dental</strong>. Happy to help!<br><br>Which service?<br>1️⃣ Routine Cleaning — $150<br>2️⃣ Deep Cleaning — $350<br>3️⃣ Whitening — $500', time: '3:15 PM' },
                { sender: 'user', text: 'Routine cleaning', time: '3:16 PM', typingPreview: 'Routine cleaning' },
                { sender: 'bot',  text: '📅 Available slots:<br><br>◾ 9:00 AM — Dr. Johnson<br>◾ 11:00 AM — Dr. Johnson<br>◾ 2:30 PM — Dr. Williams<br>◾ 4:00 PM — Dr. Williams<br><br>Which works best?', time: '3:16 PM' },
                { sender: 'user', text: '11 AM with Dr. Johnson', time: '3:17 PM', typingPreview: '11 AM with Dr. Johnson' },
                { sender: 'bot',  text: '✅ <strong>Appointment Confirmed!</strong><br><br>📋 Routine Cleaning<br>👨‍⚕️ Dr. Johnson<br>📅 Tomorrow • 11:00 AM<br>📍 BrightSmile Dental, Main St<br>💰 $150<br><br>Reminder sent <strong>1 hour before</strong>. See you! 😊', time: '3:17 PM' },
            ],
            [
                { sender: 'user', text: 'Can I book a haircut appointment?', time: '10:30 AM', typingPreview: 'Can I book a haircut appointment?' },
                { sender: 'bot',  text: 'Hi! ✂️ Welcome to <strong>Urban Cuts Studio</strong>.<br><br>Today\'s openings:<br>◾ 12:00 PM — Alex<br>◾ 2:30 PM — Jordan<br>◾ 4:00 PM — Alex<br><br>Preference?', time: '10:30 AM' },
                { sender: 'user', text: '2:30 with Jordan', time: '10:31 AM', typingPreview: '2:30 with Jordan' },
                { sender: 'bot',  text: 'Great pick! 🌟 Jordan is amazing.<br><br>Add-ons?<br>🧴 Scalp Treatment — $40 (bundle saves $15)<br>💆 Hot Towel Shave — $25<br><br>Or just the cut at <strong>$35</strong>?', time: '10:31 AM' },
                { sender: 'user', text: 'Add the scalp treatment', time: '10:32 AM', typingPreview: 'Add the scalp treatment' },
                { sender: 'bot',  text: '✅ <strong>Booked!</strong><br><br>✂️ Haircut + Scalp Treatment<br>Stylist: Jordan | Today 2:30 PM<br>💰 $60 (saved $15!)<br><br>See you at Urban Cuts! 💫', time: '10:32 AM' },
            ],
            [
                { sender: 'user', text: 'I\'ve had knee pain for two weeks, need a doctor', time: '8:05 PM', typingPreview: 'I\'ve had knee pain for two weeks, need a doctor' },
                { sender: 'bot',  text: 'Sorry to hear that 🏥 Let me find the right specialist.<br><br>Duration of pain?<br>1️⃣ Less than a week<br>2️⃣ 1–4 weeks<br>3️⃣ Over a month', time: '8:05 PM' },
                { sender: 'user', text: 'About 2 weeks', time: '8:06 PM', typingPreview: 'About 2 weeks' },
                { sender: 'bot',  text: 'I\'d recommend <strong>Dr. Martinez (Orthopedics)</strong>.<br><br>Earliest: <strong>Tomorrow 9:30 AM</strong><br>Consultation: $200 (most insurance accepted)<br><br>Shall I book?', time: '8:06 PM' },
                { sender: 'user', text: 'Yes, book it', time: '8:07 PM', typingPreview: 'Yes, book it' },
                { sender: 'bot',  text: '✅ <strong>Appointment Set!</strong><br><br>👨‍⚕️ Dr. Martinez — Orthopedics<br>📅 Tomorrow • 9:30 AM<br>📍 CityHealth Clinic, Oak Ave<br>💰 $200<br><br>⚡ Reminder 1 hour before. Feel better soon! 🙏', time: '8:07 PM' },
            ],
        ],
        bookings: [
            { id:1, name:'Sarah Johnson',  initials:'SJ', phone:'+1 555-234-5678', service:'Routine Cleaning',  date:'Mar 3', time:'11:00 AM', source:'WhatsApp', sourceIcon:'💬', sourceClass:'bg-green-500/10 text-green-400 border border-green-500/20', amount:150,  status:'Confirmed', statusClass:'bg-green-500/10 text-green-400', statusDot:'bg-green-400', avatarBg:'bg-purple-600', isNew:false },
            { id:2, name:'Mike Williams',  initials:'MW', phone:'+1 555-345-6789', service:'Deep Cleaning',     date:'Mar 3', time:'2:00 PM',  source:'WhatsApp', sourceIcon:'💬', sourceClass:'bg-green-500/10 text-green-400 border border-green-500/20', amount:350,  status:'Confirmed', statusClass:'bg-green-500/10 text-green-400', statusDot:'bg-green-400', avatarBg:'bg-blue-600',   isNew:false },
            { id:3, name:'Emily Davis',   initials:'ED', phone:'+1 555-456-7890', service:'Whitening',          date:'Mar 3', time:'3:30 PM',  source:'Google Ads', sourceIcon:'🔍', sourceClass:'bg-blue-500/10 text-blue-400 border border-blue-500/20',    amount:500,  status:'Pending',   statusClass:'bg-yellow-500/10 text-yellow-400', statusDot:'bg-yellow-400', avatarBg:'bg-rose-600',   isNew:false },
            { id:4, name:'James Brown',   initials:'JB', phone:'+1 555-567-8901', service:'Consultation',       date:'Mar 3', time:'4:30 PM',  source:'WhatsApp', sourceIcon:'💬', sourceClass:'bg-green-500/10 text-green-400 border border-green-500/20', amount:200,  status:'Confirmed', statusClass:'bg-green-500/10 text-green-400', statusDot:'bg-green-400', avatarBg:'bg-indigo-600', isNew:false },
            { id:5, name:'Lisa Martinez', initials:'LM', phone:'+1 555-678-9012', service:'Teeth Whitening',    date:'Mar 3', time:'5:00 PM',  source:'WhatsApp', sourceIcon:'💬', sourceClass:'bg-green-500/10 text-green-400 border border-green-500/20', amount:500,  status:'Confirmed', statusClass:'bg-green-500/10 text-green-400', statusDot:'bg-green-400', avatarBg:'bg-emerald-600',isNew:true  },
            { id:6, name:'David Wilson',  initials:'DW', phone:'+1 555-789-0123', service:'Routine Cleaning',   date:'Mar 4', time:'10:00 AM', source:'Instagram', sourceIcon:'📸', sourceClass:'bg-pink-500/10 text-pink-400 border border-pink-500/20',    amount:150,  status:'New',       statusClass:'bg-cyan-500/10 text-cyan-400',    statusDot:'bg-cyan-400',   avatarBg:'bg-orange-600', isNew:true  },
        ],
        lossCalc: {
            defaultValue: 100,
            minLabel: '$25',
            maxLabel: '$2,500',
            min: 25,
            max: 2500,
            step: 25,
            missedLabel: 'Average value per customer ($)',
            roiMessages: {
                low:  (type) => `A ${type} missing ~30% of ~5 daily enquiries could lose $900–$3,000/month. Our AI recovers most of that — automatically.`,
                mid:  (type) => `A ${type} getting ~20 enquiries/day and missing 30% could lose $3,600–$12,000/month. Our AI handles all of them, 24/7.`,
                high: (type) => `At ~60 enquiries/day, missing 30% in a ${type} business could cost $10K–$40K/month. Our AI literally pays for itself in the first week.`,
                max:  (type) => `At 100+ enquiries/day, even a 10% miss rate in ${type} costs tens of thousands monthly. Our AI closes that gap immediately.`,
            },
        },
    },

    /* ── United Kingdom ── */
    gb: {
        country: 'GB',
        region: 'gb',
        currency: '£',
        currencyCode: 'GBP',
        phone: '+44 20 7946 0958',
        whatsappNumber: '919243077840',
        locale: 'en-GB',
        tagline: 'AI-powered automation built for UK businesses.',
        conversations: [
            [
                { sender: 'user', text: 'Hi, I need to book a dental check-up', time: '14:32', typingPreview: 'Hi, I need to book a dental check-up' },
                { sender: 'bot',  text: 'Hello! 👋 Welcome to <strong>Harley Dental Practice</strong>. Happy to help!<br><br>Which service?<br>1️⃣ Check-up — £65<br>2️⃣ Scale & Polish — £120<br>3️⃣ Root Canal — £450', time: '14:32' },
                { sender: 'user', text: 'Check-up please', time: '14:33', typingPreview: 'Check-up please' },
                { sender: 'bot',  text: '📅 Available tomorrow:<br><br>◾ 09:30 — Dr. Campbell<br>◾ 11:00 — Dr. Campbell<br>◾ 14:00 — Dr. Patel<br>◾ 16:30 — Dr. Patel<br><br>Which suits?', time: '14:33' },
                { sender: 'user', text: '11:00 with Dr. Campbell', time: '14:34', typingPreview: '11:00 with Dr. Campbell' },
                { sender: 'bot',  text: '✅ <strong>Booking Confirmed!</strong><br><br>📋 Dental Check-up<br>👨‍⚕️ Dr. Campbell<br>📅 Tomorrow • 11:00<br>📍 Harley Dental, High Street<br>💰 £65<br><br>Reminder <strong>1 hour before</strong>. See you! 😊', time: '14:34' },
            ],
            [
                { sender: 'user', text: 'Can I book a haircut today?', time: '11:15', typingPreview: 'Can I book a haircut today?' },
                { sender: 'bot',  text: 'Hi! ✂️ Welcome to <strong>The Style Room</strong>.<br><br>Today\'s slots:<br>◾ 13:30 — Sophie<br>◾ 15:00 — Liam<br>◾ 17:00 — Sophie<br><br>Preference?', time: '11:15' },
                { sender: 'user', text: '15:00 with Liam', time: '11:16', typingPreview: '15:00 with Liam' },
                { sender: 'bot',  text: 'Great choice! 🌟 Liam is brilliant.<br><br>Add-ons?<br>🧴 Hair Treatment — £30 (bundle saves £10)<br>💆 Head Massage — £15<br><br>Or just the cut at <strong>£25</strong>?', time: '11:16' },
                { sender: 'user', text: 'Add the treatment please', time: '11:17', typingPreview: 'Add the treatment please' },
                { sender: 'bot',  text: '✅ <strong>Booked!</strong><br><br>✂️ Haircut + Treatment<br>Stylist: Liam | Today 15:00<br>💰 £45 (saved £10!)<br><br>See you at The Style Room! 💫', time: '11:17' },
            ],
            [
                { sender: 'user', text: 'I\'ve had back pain, need to see a specialist', time: '20:45', typingPreview: 'I\'ve had back pain, need to see a specialist' },
                { sender: 'bot',  text: 'Sorry to hear that 🏥 Let me find the right specialist.<br><br>How long have you had the pain?<br>1️⃣ Less than a week<br>2️⃣ 1–4 weeks<br>3️⃣ Over a month', time: '20:45' },
                { sender: 'user', text: 'About 2 weeks', time: '20:46', typingPreview: 'About 2 weeks' },
                { sender: 'bot',  text: 'I\'d recommend <strong>Dr. Thompson (Orthopaedics)</strong>.<br><br>Earliest: <strong>Tomorrow 10:00</strong><br>Consultation: £95<br><br>Shall I book?', time: '20:46' },
                { sender: 'user', text: 'Yes please', time: '20:47', typingPreview: 'Yes please' },
                { sender: 'bot',  text: '✅ <strong>Appointment Confirmed!</strong><br><br>👨‍⚕️ Dr. Thompson — Orthopaedics<br>📅 Tomorrow • 10:00<br>📍 Riverside Clinic, King\'s Road<br>💰 £95<br><br>⚡ Reminder 1 hour before. Get well soon! 🙏', time: '20:47' },
            ],
        ],
        bookings: [
            { id:1, name:'Emma Campbell', initials:'EC', phone:'+44 7700 900123', service:'Dental Check-up',   date:'Mar 3', time:'11:00',    source:'WhatsApp', sourceIcon:'💬', sourceClass:'bg-green-500/10 text-green-400 border border-green-500/20', amount:65,   status:'Confirmed', statusClass:'bg-green-500/10 text-green-400', statusDot:'bg-green-400', avatarBg:'bg-purple-600', isNew:false },
            { id:2, name:'Oliver Smith',  initials:'OS', phone:'+44 7700 900234', service:'Scale & Polish',     date:'Mar 3', time:'14:00',    source:'WhatsApp', sourceIcon:'💬', sourceClass:'bg-green-500/10 text-green-400 border border-green-500/20', amount:120,  status:'Confirmed', statusClass:'bg-green-500/10 text-green-400', statusDot:'bg-green-400', avatarBg:'bg-blue-600',   isNew:false },
            { id:3, name:'Sophie Jones',  initials:'SJ', phone:'+44 7700 900345', service:'Root Canal',         date:'Mar 3', time:'15:30',    source:'Google Ads', sourceIcon:'🔍', sourceClass:'bg-blue-500/10 text-blue-400 border border-blue-500/20',    amount:450,  status:'Pending',   statusClass:'bg-yellow-500/10 text-yellow-400', statusDot:'bg-yellow-400', avatarBg:'bg-rose-600',   isNew:false },
            { id:4, name:'Liam Wilson',   initials:'LW', phone:'+44 7700 900456', service:'Consultation',       date:'Mar 3', time:'16:30',    source:'WhatsApp', sourceIcon:'💬', sourceClass:'bg-green-500/10 text-green-400 border border-green-500/20', amount:95,   status:'Confirmed', statusClass:'bg-green-500/10 text-green-400', statusDot:'bg-green-400', avatarBg:'bg-indigo-600', isNew:false },
            { id:5, name:'Amelia Brown',  initials:'AB', phone:'+44 7700 900567', service:'Teeth Whitening',    date:'Mar 3', time:'17:00',    source:'WhatsApp', sourceIcon:'💬', sourceClass:'bg-green-500/10 text-green-400 border border-green-500/20', amount:350,  status:'Confirmed', statusClass:'bg-green-500/10 text-green-400', statusDot:'bg-green-400', avatarBg:'bg-emerald-600',isNew:true  },
            { id:6, name:'George Taylor', initials:'GT', phone:'+44 7700 900678', service:'Dental Check-up',   date:'Mar 4', time:'10:00',    source:'Instagram', sourceIcon:'📸', sourceClass:'bg-pink-500/10 text-pink-400 border border-pink-500/20',    amount:65,   status:'New',       statusClass:'bg-cyan-500/10 text-cyan-400',    statusDot:'bg-cyan-400',   avatarBg:'bg-orange-600', isNew:true  },
        ],
        lossCalc: {
            defaultValue: 80,
            minLabel: '£20',
            maxLabel: '£2,000',
            min: 20,
            max: 2000,
            step: 20,
            missedLabel: 'Average value per customer (£)',
            roiMessages: {
                low:  (type) => `A ${type} missing ~30% of ~5 daily enquiries could lose £700–£2,500/month. Our AI recovers most of that — automatically.`,
                mid:  (type) => `A ${type} getting ~20 enquiries/day and missing 30% could lose £3K–£10K/month. Our AI handles all of them, 24/7.`,
                high: (type) => `At ~60 enquiries/day, missing 30% in a ${type} business could cost £8K–£30K/month. Our AI pays for itself in the first week.`,
                max:  (type) => `At 100+ enquiries/day, even a 10% miss rate in ${type} costs tens of thousands monthly. Our AI closes that gap immediately.`,
            },
        },
    },

    /* ── UAE ── */
    ae: {
        country: 'AE',
        region: 'ae',
        currency: 'AED ',
        currencyCode: 'AED',
        phone: '+971 4 123 4567',
        whatsappNumber: '919243077840',
        locale: 'en-AE',
        tagline: 'AI-powered automation built for UAE & GCC businesses.',
        conversations: [
            [
                { sender: 'user', text: 'Hi, I want to book a dental checkup', time: '10:32 AM', typingPreview: 'Hi, I want to book a dental checkup' },
                { sender: 'bot',  text: 'Hello! 👋 Welcome to <strong>Pearl Dental Clinic</strong>. Happy to help!<br><br>Which service?<br>1️⃣ Checkup — AED 200<br>2️⃣ Teeth Cleaning — AED 500<br>3️⃣ Root Canal — AED 2,500', time: '10:32 AM' },
                { sender: 'user', text: 'Checkup please', time: '10:33 AM', typingPreview: 'Checkup please' },
                { sender: 'bot',  text: '📅 Available tomorrow:<br><br>◾ 10:00 AM — Dr. Al-Rashid<br>◾ 12:00 PM — Dr. Al-Rashid<br>◾ 3:00 PM — Dr. Khan<br>◾ 5:00 PM — Dr. Khan<br><br>Which suits you?', time: '10:33 AM' },
                { sender: 'user', text: '12 PM with Dr. Al-Rashid', time: '10:34 AM', typingPreview: '12 PM with Dr. Al-Rashid' },
                { sender: 'bot',  text: '✅ <strong>Booking Confirmed!</strong><br><br>📋 Dental Checkup<br>👨‍⚕️ Dr. Al-Rashid<br>📅 Tomorrow • 12:00 PM<br>📍 Pearl Dental, JLT<br>💰 AED 200<br><br>Reminder <strong>1 hour before</strong>. See you! 😊', time: '10:34 AM' },
            ],
            [
                { sender: 'user', text: 'Can I book a grooming appointment?', time: '4:15 PM', typingPreview: 'Can I book a grooming appointment?' },
                { sender: 'bot',  text: 'Welcome! ✂️ <strong>Luxe Barber Lounge</strong>.<br><br>Today\'s slots:<br>◾ 5:30 PM — Omar<br>◾ 7:00 PM — Khalid<br>◾ 8:30 PM — Omar<br><br>Preference?', time: '4:15 PM' },
                { sender: 'user', text: '7 PM with Khalid', time: '4:16 PM', typingPreview: '7 PM with Khalid' },
                { sender: 'bot',  text: 'Excellent! 🌟 Khalid is our best.<br><br>Add-ons?<br>🧴 Hot Towel Shave — AED 80 (combo saves AED 30)<br>💆 Scalp Massage — AED 50<br><br>Or just the grooming at <strong>AED 120</strong>?', time: '4:16 PM' },
                { sender: 'user', text: 'Add the hot towel shave', time: '4:17 PM', typingPreview: 'Add the hot towel shave' },
                { sender: 'bot',  text: '✅ <strong>Booked!</strong><br><br>✂️ Grooming + Hot Towel Shave<br>Stylist: Khalid | Today 7:00 PM<br>💰 AED 170 (saved AED 30!)<br><br>See you at Luxe Barber! 💫', time: '4:17 PM' },
            ],
            [
                { sender: 'user', text: 'I need to see a physiotherapist for shoulder pain', time: '9:30 PM', typingPreview: 'I need to see a physiotherapist for shoulder pain' },
                { sender: 'bot',  text: 'Let me help 🏥 <br><br>How long have you had the pain?<br>1️⃣ Less than a week<br>2️⃣ 1–4 weeks<br>3️⃣ Over a month', time: '9:30 PM' },
                { sender: 'user', text: 'About 3 weeks', time: '9:31 PM', typingPreview: 'About 3 weeks' },
                { sender: 'bot',  text: 'I\'d recommend <strong>Dr. Hassan (Sports Medicine)</strong>.<br><br>Earliest: <strong>Tomorrow 11:00 AM</strong><br>Consultation: AED 400<br><br>Shall I book?', time: '9:31 PM' },
                { sender: 'user', text: 'Yes, please book', time: '9:32 PM', typingPreview: 'Yes, please book' },
                { sender: 'bot',  text: '✅ <strong>Appointment Confirmed!</strong><br><br>👨‍⚕️ Dr. Hassan — Sports Medicine<br>📅 Tomorrow • 11:00 AM<br>📍 MedCare Clinic, Dubai Marina<br>💰 AED 400<br><br>⚡ Reminder 1 hour before. Get well soon! 🙏', time: '9:32 PM' },
            ],
        ],
        bookings: [
            { id:1, name:'Fatima Al-Sayed',initials:'FA', phone:'+971 50 123 4567', service:'Dental Checkup',  date:'Mar 3', time:'12:00 PM', source:'WhatsApp', sourceIcon:'💬', sourceClass:'bg-green-500/10 text-green-400 border border-green-500/20', amount:200,  status:'Confirmed', statusClass:'bg-green-500/10 text-green-400', statusDot:'bg-green-400', avatarBg:'bg-purple-600', isNew:false },
            { id:2, name:'Ahmed Hassan',   initials:'AH', phone:'+971 55 234 5678', service:'Teeth Cleaning',  date:'Mar 3', time:'2:00 PM',  source:'WhatsApp', sourceIcon:'💬', sourceClass:'bg-green-500/10 text-green-400 border border-green-500/20', amount:500,  status:'Confirmed', statusClass:'bg-green-500/10 text-green-400', statusDot:'bg-green-400', avatarBg:'bg-blue-600',   isNew:false },
            { id:3, name:'Sara Khan',      initials:'SK', phone:'+971 56 345 6789', service:'Root Canal',       date:'Mar 3', time:'3:30 PM',  source:'Google Ads', sourceIcon:'🔍', sourceClass:'bg-blue-500/10 text-blue-400 border border-blue-500/20',    amount:2500, status:'Pending',   statusClass:'bg-yellow-500/10 text-yellow-400', statusDot:'bg-yellow-400', avatarBg:'bg-rose-600',   isNew:false },
            { id:4, name:'Omar Bin Rashid',initials:'OR', phone:'+971 52 456 7890', service:'Consultation',     date:'Mar 3', time:'5:00 PM',  source:'WhatsApp', sourceIcon:'💬', sourceClass:'bg-green-500/10 text-green-400 border border-green-500/20', amount:400,  status:'Confirmed', statusClass:'bg-green-500/10 text-green-400', statusDot:'bg-green-400', avatarBg:'bg-indigo-600', isNew:false },
            { id:5, name:'Layla Mohammed', initials:'LM', phone:'+971 54 567 8901', service:'Teeth Whitening',  date:'Mar 3', time:'6:00 PM',  source:'WhatsApp', sourceIcon:'💬', sourceClass:'bg-green-500/10 text-green-400 border border-green-500/20', amount:1500, status:'Confirmed', statusClass:'bg-green-500/10 text-green-400', statusDot:'bg-green-400', avatarBg:'bg-emerald-600',isNew:true  },
            { id:6, name:'Khalid Ibrahim', initials:'KI', phone:'+971 58 678 9012', service:'Dental Checkup',  date:'Mar 4', time:'10:00 AM', source:'Instagram', sourceIcon:'📸', sourceClass:'bg-pink-500/10 text-pink-400 border border-pink-500/20',    amount:200,  status:'New',       statusClass:'bg-cyan-500/10 text-cyan-400',    statusDot:'bg-cyan-400',   avatarBg:'bg-orange-600', isNew:true  },
        ],
        lossCalc: {
            defaultValue: 500,
            minLabel: 'AED 100',
            maxLabel: 'AED 10K',
            min: 100,
            max: 10000,
            step: 100,
            missedLabel: 'Average value per customer (AED)',
            roiMessages: {
                low:  (type) => `A ${type} missing ~30% of ~5 daily enquiries could lose AED 3K–10K/month. Our AI recovers most of that — automatically.`,
                mid:  (type) => `A ${type} getting ~20 enquiries/day and missing 30% could lose AED 12K–40K/month. Our AI handles all of them, 24/7.`,
                high: (type) => `At ~60 enquiries/day, missing 30% in a ${type} business could cost AED 40K–150K/month. Our AI pays for itself in the first week.`,
                max:  (type) => `At 100+ enquiries/day, even a 10% miss rate in ${type} costs hundreds of thousands monthly. Our AI closes that gap immediately.`,
            },
        },
    },

    /* ── Singapore ── */
    sg: {
        country: 'SG',
        region: 'sg',
        currency: 'S$',
        currencyCode: 'SGD',
        phone: '+65 6123 4567',
        whatsappNumber: '919243077840',
        locale: 'en-SG',
        tagline: 'AI-powered automation built for Singapore & APAC businesses.',
        conversations: [
            [
                { sender: 'user', text: 'Hi, I want to book a dental cleaning', time: '2:30 PM', typingPreview: 'Hi, I want to book a dental cleaning' },
                { sender: 'bot',  text: 'Hello! 👋 Welcome to <strong>Orchard Dental</strong>. Happy to help!<br><br>Services:<br>1️⃣ Scaling & Polishing — S$120<br>2️⃣ Fillings — S$180<br>3️⃣ Root Canal — S$800', time: '2:30 PM' },
                { sender: 'user', text: 'Scaling and polishing', time: '2:31 PM', typingPreview: 'Scaling and polishing' },
                { sender: 'bot',  text: '📅 Available slots:<br><br>◾ 10:00 AM — Dr. Tan<br>◾ 11:30 AM — Dr. Tan<br>◾ 2:00 PM — Dr. Lim<br>◾ 4:00 PM — Dr. Lim<br><br>Which works?', time: '2:31 PM' },
                { sender: 'user', text: '11:30 AM with Dr. Tan', time: '2:32 PM', typingPreview: '11:30 AM with Dr. Tan' },
                { sender: 'bot',  text: '✅ <strong>Booking Confirmed!</strong><br><br>📋 Scaling & Polishing<br>👨‍⚕️ Dr. Tan<br>📅 Tomorrow • 11:30 AM<br>📍 Orchard Dental, Orchard Rd<br>💰 S$120<br><br>Reminder <strong>1 hour before</strong>. See you! 😊', time: '2:32 PM' },
            ],
            [
                { sender: 'user', text: 'Can I book a haircut?', time: '11:00 AM', typingPreview: 'Can I book a haircut?' },
                { sender: 'bot',  text: 'Hi! ✂️ Welcome to <strong>The Barber Co</strong>.<br><br>Today\'s slots:<br>◾ 1:00 PM — Wei<br>◾ 3:00 PM — Daniel<br>◾ 5:30 PM — Wei<br><br>Preference?', time: '11:00 AM' },
                { sender: 'user', text: '3 PM with Daniel', time: '11:01 AM', typingPreview: '3 PM with Daniel' },
                { sender: 'bot',  text: 'Nice! 🌟 Daniel is fantastic.<br><br>Add-ons?<br>🧴 Hair Treatment — S$40 (bundle saves S$10)<br>💆 Scalp Massage — S$20<br><br>Or just the cut at <strong>S$30</strong>?', time: '11:01 AM' },
                { sender: 'user', text: 'Add the treatment', time: '11:02 AM', typingPreview: 'Add the treatment' },
                { sender: 'bot',  text: '✅ <strong>Booked!</strong><br><br>✂️ Haircut + Treatment<br>Stylist: Daniel | Today 3:00 PM<br>💰 S$60 (saved S$10!)<br><br>See you at The Barber Co! 💫', time: '11:02 AM' },
            ],
        ],
        bookings: [
            { id:1, name:'Wei Lin Tan',   initials:'WT', phone:'+65 9123 4567', service:'Scaling & Polishing', date:'Mar 3', time:'11:30 AM', source:'WhatsApp', sourceIcon:'💬', sourceClass:'bg-green-500/10 text-green-400 border border-green-500/20', amount:120,  status:'Confirmed', statusClass:'bg-green-500/10 text-green-400', statusDot:'bg-green-400', avatarBg:'bg-purple-600', isNew:false },
            { id:2, name:'Priya Nair',    initials:'PN', phone:'+65 8234 5678', service:'Fillings',            date:'Mar 3', time:'2:00 PM',  source:'WhatsApp', sourceIcon:'💬', sourceClass:'bg-green-500/10 text-green-400 border border-green-500/20', amount:180,  status:'Confirmed', statusClass:'bg-green-500/10 text-green-400', statusDot:'bg-green-400', avatarBg:'bg-blue-600',   isNew:false },
            { id:3, name:'Daniel Lim',    initials:'DL', phone:'+65 9345 6789', service:'Root Canal',          date:'Mar 3', time:'3:30 PM',  source:'Google Ads', sourceIcon:'🔍', sourceClass:'bg-blue-500/10 text-blue-400 border border-blue-500/20',    amount:800,  status:'Pending',   statusClass:'bg-yellow-500/10 text-yellow-400', statusDot:'bg-yellow-400', avatarBg:'bg-rose-600',   isNew:false },
            { id:4, name:'Sarah Chen',    initials:'SC', phone:'+65 8456 7890', service:'Consultation',        date:'Mar 3', time:'4:00 PM',  source:'WhatsApp', sourceIcon:'💬', sourceClass:'bg-green-500/10 text-green-400 border border-green-500/20', amount:150,  status:'Confirmed', statusClass:'bg-green-500/10 text-green-400', statusDot:'bg-green-400', avatarBg:'bg-indigo-600', isNew:false },
            { id:5, name:'Raj Kumar',     initials:'RK', phone:'+65 9567 8901', service:'Teeth Whitening',     date:'Mar 3', time:'5:00 PM',  source:'WhatsApp', sourceIcon:'💬', sourceClass:'bg-green-500/10 text-green-400 border border-green-500/20', amount:600,  status:'Confirmed', statusClass:'bg-green-500/10 text-green-400', statusDot:'bg-green-400', avatarBg:'bg-emerald-600',isNew:true  },
            { id:6, name:'Amy Wong',      initials:'AW', phone:'+65 8678 9012', service:'Scaling & Polishing', date:'Mar 4', time:'10:00 AM', source:'Instagram', sourceIcon:'📸', sourceClass:'bg-pink-500/10 text-pink-400 border border-pink-500/20',    amount:120,  status:'New',       statusClass:'bg-cyan-500/10 text-cyan-400',    statusDot:'bg-cyan-400',   avatarBg:'bg-orange-600', isNew:true  },
        ],
        lossCalc: {
            defaultValue: 150,
            minLabel: 'S$30',
            maxLabel: 'S$3,000',
            min: 30,
            max: 3000,
            step: 30,
            missedLabel: 'Average value per customer (S$)',
            roiMessages: {
                low:  (type) => `A ${type} missing ~30% of ~5 daily enquiries could lose S$1.5K–5K/month. Our AI recovers most of that — automatically.`,
                mid:  (type) => `A ${type} getting ~20 enquiries/day and missing 30% could lose S$5K–18K/month. Our AI handles all of them, 24/7.`,
                high: (type) => `At ~60 enquiries/day, missing 30% in a ${type} business could cost S$15K–50K/month. Our AI pays for itself in the first week.`,
                max:  (type) => `At 100+ enquiries/day, even a 10% miss rate in ${type} costs tens of thousands monthly. Our AI closes that gap immediately.`,
            },
        },
    },
};

/* Country-code → region mapping */
const COUNTRY_REGION_MAP = {
    'IN': 'in',
    'US': 'us', 'CA': 'us',                               // North America
    'GB': 'gb', 'IE': 'gb',                               // British Isles
    'AE': 'ae', 'SA': 'ae', 'QA': 'ae', 'KW': 'ae',     // GCC
    'BH': 'ae', 'OM': 'ae',
    'SG': 'sg', 'MY': 'sg', 'TH': 'sg', 'PH': 'sg',     // Southeast Asia
    'ID': 'sg', 'VN': 'sg',
    'AU': 'us', 'NZ': 'us',                               // Oceania → USD-adjacent
};

/* ═══════════════════════════════════════════════════
   GEO DETECTION
   ═══════════════════════════════════════════════════ */

const GEO_CACHE_KEY = 'hx_geo_region';
const GEO_CACHE_TTL = 24 * 60 * 60 * 1000; // 24 hours

function getCachedRegion() {
    try {
        const raw = localStorage.getItem(GEO_CACHE_KEY);
        if (!raw) return null;
        const data = JSON.parse(raw);
        if (Date.now() - data.ts > GEO_CACHE_TTL) {
            localStorage.removeItem(GEO_CACHE_KEY);
            return null;
        }
        return data.region;
    } catch { return null; }
}

function cacheRegion(region) {
    try {
        localStorage.setItem(GEO_CACHE_KEY, JSON.stringify({ region, ts: Date.now() }));
    } catch { /* quota exceeded — ignore */ }
}

async function detectCountry() {
    // 1. Check cache first
    const cached = getCachedRegion();
    if (cached && REGIONS[cached]) return cached;

    // 2. Check URL query param override (for testing: ?geo=us)
    const urlParams = new URLSearchParams(window.location.search);
    const override = urlParams.get('geo');
    if (override && REGIONS[override]) {
        cacheRegion(override);
        return override;
    }

    // 3. Fetch from free geo API
    try {
        const controller = new AbortController();
        const timeout = setTimeout(() => controller.abort(), 3000);

        const resp = await fetch('https://ipapi.co/json/', { signal: controller.signal });
        clearTimeout(timeout);

        if (resp.ok) {
            const data = await resp.json();
            const cc = (data.country_code || '').toUpperCase();
            const region = COUNTRY_REGION_MAP[cc] || 'in';
            cacheRegion(region);
            return region;
        }
    } catch { /* network error — fall through */ }

    // 4. Try timezone-based fallback
    try {
        const tz = Intl.DateTimeFormat().resolvedOptions().timeZone || '';
        if (tz.startsWith('America/')) return 'us';
        if (tz.startsWith('Europe/London') || tz.includes('Dublin')) return 'gb';
        if (tz.includes('Dubai') || tz.includes('Riyadh')) return 'ae';
        if (tz.includes('Singapore') || tz.includes('Kuala_Lumpur')) return 'sg';
    } catch { /* ignore */ }

    // 5. Default to India
    return 'in';
}


/* ═══════════════════════════════════════════════════
   ALPINE STORE REGISTRATION
   ═══════════════════════════════════════════════════ */

document.addEventListener('alpine:init', () => {

    // Register the geo store with India defaults (loads instantly)
    Alpine.store('geo', {
        ready: false,
        ...REGIONS['in'],

        /** Replace store contents with detected region data */
        _applyRegion(regionKey) {
            const data = REGIONS[regionKey] || REGIONS['in'];
            Object.keys(data).forEach(k => { this[k] = data[k]; });
            this.ready = true;
        },

        /** Get formatted currency amount */
        formatAmount(amount) {
            try {
                return new Intl.NumberFormat(this.locale, {
                    style: 'currency',
                    currency: this.currencyCode,
                    minimumFractionDigits: 0,
                    maximumFractionDigits: 0,
                }).format(amount);
            } catch {
                return this.currency + amount.toLocaleString();
            }
        },

        /** Get ROI message based on volume tier */
        getRoiMessage(vol, type) {
            const msgs = this.lossCalc.roiMessages;
            if (vol === 'Under 10/day') return msgs.low(type);
            if (vol === '10–30/day')    return msgs.mid(type);
            if (vol === '30–100/day')   return msgs.high(type);
            return msgs.max(type);
        },
    });

    // Start async detection — store updates reactively once done
    detectCountry().then(region => {
        Alpine.store('geo')._applyRegion(region);
        // Dispatch custom event for components that need to re-init
        window.dispatchEvent(new CustomEvent('geo:ready', { detail: { region } }));
    });
});

/* ═══════════════════════════════════════════════════
   HELPER: Expose for inline <script> access
   ═══════════════════════════════════════════════════ */
window.__geoRegions = REGIONS;
window.__geoDetect  = detectCountry;
