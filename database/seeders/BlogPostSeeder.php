<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use Illuminate\Database\Seeder;

class BlogPostSeeder extends Seeder
{
    public function run(): void
    {
        $posts = [
            [
                'category' => 'coconut-economy',
                'title' => 'From Badagry to the World: How the Coconut Value Chain Can Grow African Prosperity',
                'slug' => 'badagry-to-the-world-coconut-value-chain-african-prosperity',
                'featured_image' => '/images/blog/nigeria-coconut-tree-fruit.jpg',
                'excerpt' => 'A practical look at how coconut farming, processing, branding, tourism, and export readiness can turn local heritage into sustainable economic opportunity.',
                'seo_title' => 'African Coconut Value Chain: Farming, Processing, Export and Prosperity',
                'seo_description' => 'Learn how the coconut value chain can create jobs, support farmers, grow SMEs, promote exports, and position AFRICOCO as a catalyst for African coconut prosperity.',
                'published_at' => now()->subDays(3),
                'body' => <<<'HTML'
<p>Coconut is easy to underestimate because it looks so familiar. It sits in markets, appears beside beaches, flavors food, refreshes travelers, and shows up in family stories. Yet behind that familiar shell is a serious economic engine. For communities in Badagry, Lagos State, coastal Nigeria, Ghana, Kenya, Tanzania, Mozambique, India, Sri Lanka, the Philippines, Indonesia, and the Caribbean, coconut is not just a fruit. It is a value chain with farming, processing, packaging, logistics, tourism, research, branding, and export potential. When AFRICOCO speaks about preserving Africa's coconut heritage, the conversation is also about building prosperity from something already rooted in the soil and memory of the people.</p>

<p>The first link in the value chain is the farmer. A coconut farmer does more than plant a tree and wait. The farmer makes decisions about seedling quality, spacing, soil health, water access, pest control, harvesting, and intercropping. In many African communities, coconut farms can sit beside cassava, vegetables, legumes, livestock, beekeeping, or small agro-processing spaces. This matters because a coconut tree can become part of a wider household economy. A well-supported farmer can sell mature nuts, tender coconuts, seedlings, husks, fronds, sap, shells, and farm experiences. The opportunity expands when farmers are trained, organized into cooperatives, connected to buyers, and given access to market information.</p>

<p>The second link is processing. Raw coconut has value, but processed coconut has far more possibilities. Coconut water can become a bottled beverage. Coconut meat can become desiccated coconut, snacks, flour, milk, cream, oil, or confectionery ingredients. Coconut shell can become activated carbon, craft products, charcoal briquettes, buttons, utensils, and decorative pieces. Coconut husk can become coir fiber, ropes, erosion-control mats, brushes, mattresses, seedling media, and garden products. Even coconut leaves and fronds can feed a craft economy. The most exciting part is that many of these products do not require a giant factory to begin. They require food safety discipline, good packaging, standardization, cooperative equipment, branding, and patient market development.</p>

<p>Across international markets, coconut has become a lifestyle product. Consumers buy coconut oil for cooking and cosmetics, coconut water for hydration, coconut milk for plant-based diets, coconut flour for gluten-free baking, coir for gardening, and activated carbon for filtration. African businesses can participate in these markets, but the bridge from local promise to global demand is quality. Export buyers want reliable supply, clean processing environments, traceability, consistent moisture content, proper labeling, and documentation. This is where institutions, development partners, and initiatives like AFRICOCO can play a major role by helping local producers understand standards before they lose money through trial and error.</p>

<p>The local opportunity is not limited to export. Nigeria and other African countries have large domestic markets that still import products they could produce more competitively with better organization. Hotels need coconut water, coconut snacks, soaps, oils, and craft items. Restaurants need coconut milk, cream, and flavor ingredients. Schools can use coconut enterprise as a practical teaching tool for agriculture, science, culture, and entrepreneurship. Wellness brands need reliable oils and butters. Landscapers and nurseries need coir and seedlings. Event organizers need coconut-themed experiences. A strong local market gives producers cash flow while they prepare for international opportunities.</p>

<p>Tourism adds a different kind of value. A coconut farm can be a classroom, a photo location, a tasting center, a cultural storytelling space, and a small marketplace. Visitors may come for a festival and leave with coconut oil, crafts, seedlings, snacks, and a better understanding of coastal heritage. In places like Badagry, where history, culture, waterways, food, and community life already carry tourism appeal, coconut can become part of a richer destination story. This is why AgunkeFest and similar heritage events matter. They turn an agricultural product into an experience, and experience is one of the strongest forms of branding.</p>

<p>However, the value chain will not grow by enthusiasm alone. It needs coordination. Farmers need extension support. Young people need training in product development, photography, digital marketing, bookkeeping, and e-commerce. Women-led groups need access to safe processing equipment and cooperative finance. Researchers need field data. Investors need credible project pipelines. Government agencies need policy feedback from people who actually grow and process coconut. Media platforms need stories that make coconut visible beyond jokes and beach imagery. A serious value chain is a network, not a slogan.</p>

<p>AFRICOCO can help by acting as a convener. The organization can bring farmers, processors, chefs, tourism operators, designers, scientists, exporters, sponsors, and public agencies into the same room. It can document best practices, spotlight community businesses, support training, create demonstration projects, and use festivals as marketplaces for knowledge. It can also help the public understand that coconut is not a side issue. It touches food security, climate resilience, youth employment, women empowerment, coastal livelihoods, heritage preservation, and African trade.</p>

<p>The future of the coconut economy will belong to communities that combine tradition with discipline. A farmer's wisdom must meet modern agronomy. A grandmother's recipe must meet food safety. A local craft must meet good design. A festival must meet digital storytelling. A small business must meet bookkeeping. A village product must meet packaging that can stand proudly beside international brands. From Badagry to the world, coconut can carry African identity and economic value at the same time. The shell is hard, yes, but the opportunity inside is generous.</p>
HTML
            ],
            [
                'category' => 'sustainability',
                'title' => 'Coconut Trees, Climate Resilience, and the Communities Protecting Africa\'s Coastlines',
                'slug' => 'coconut-trees-climate-resilience-african-coastlines',
                'featured_image' => '/images/blog/coconuts-drying-copra-processing.jpg',
                'excerpt' => 'Coconut trees can support climate adaptation, coastal livelihoods, soil protection, and community enterprise when planted and managed with care.',
                'seo_title' => 'Coconut Trees and Climate Resilience in African Coastal Communities',
                'seo_description' => 'Discover how coconut trees can support climate resilience, coastal protection, livelihoods, biodiversity, and sustainable community development across Africa.',
                'published_at' => now()->subDays(2),
                'body' => <<<'HTML'
<p>Climate change can sound like a distant scientific phrase until it arrives as flooded streets, hotter farms, coastal erosion, failed harvests, unstable income, or families moving because the land no longer behaves the way it did. In coastal and tropical communities, the conversation is immediate. People are asking practical questions: What can we plant? How do we protect the soil? How do young people earn without destroying the environment? How can heritage become a tool for adaptation rather than a memory of what has been lost? Coconut trees are not a magical solution to every climate challenge, but they can be part of a strong and culturally grounded answer.</p>

<p>A coconut tree is a resilient symbol because it is useful at many levels. It can tolerate coastal conditions better than many crops, especially when appropriate varieties are selected and the land is managed properly. Its roots help hold soil. Its canopy offers shade. Its fruit supports food and enterprise. Its husk and shell can become useful materials instead of waste. Its presence in a landscape can support mixed farming systems, where families combine food crops, livestock, small processing, and tourism activities. For AFRICOCO, this is where environmental sustainability meets community empowerment. A tree is not only a tree when it becomes a source of dignity.</p>

<p>Coastal protection begins with understanding that the shoreline is alive. Sand, water, vegetation, wind, and human activity all interact. When natural vegetation is removed carelessly, communities can become more exposed to erosion and storm impact. Coconut trees, when planted as part of wider coastal vegetation planning, can help stabilize certain landscapes and create productive green belts. They should not replace mangroves, wetlands, or native ecological systems where those are more appropriate. Instead, they should be included wisely in a broader plan that respects biodiversity. Sustainability is not about planting anything anywhere; it is about planting the right thing in the right place for the right reason.</p>

<p>The economic side is just as important. Communities protect what they benefit from. If coconut planting is presented only as an environmental campaign, it may fade after the photographs are taken. But if families see that coconut can support food, income, crafts, processing, tourism, and youth enterprise, tree planting becomes an investment. A coconut seedling can become school fees, household nutrition, festival products, cooperative savings, local employment, and pride. The climate conversation becomes more persuasive when people can see how ecological care connects to everyday survival.</p>

<p>Internationally, coconut-producing countries have learned that resilience depends on systems. In Asia and the Pacific, coconut economies have had to address aging trees, storms, market volatility, disease, and quality standards. In the Caribbean, coconut is tied to tourism, food culture, and coastal identity. Across Africa, there is room to learn from these experiences without copying them blindly. Nigeria's coastal communities, for example, have their own land realities, market patterns, cultural histories, and youth demographics. AFRICOCO's role can be to translate global lessons into local action that feels practical and respectful.</p>

<p>One overlooked climate opportunity is waste reduction. Coconut husk, shell, and water are often discarded when there is no processing pathway. Yet those same materials can become coir, compost, briquettes, crafts, activated carbon, animal bedding, garden products, and natural fiber innovations. Waste is often a sign that a value chain is incomplete. When communities learn to process more of the coconut, they reduce environmental burden and increase income. The entertaining truth is that coconut is almost too generous: even after you drink the water, eat the meat, press the oil, and sell the husk, the shell is still waiting to become something useful.</p>

<p>Education is the bridge between planting and transformation. Schools can use coconut as a living curriculum. Students can study botany through coconut growth, chemistry through oil extraction, economics through pricing, geography through trade routes, climate science through coastal ecosystems, and culture through oral history. Youth clubs can document local coconut stories with phones and publish them online. Women groups can run safe processing demonstrations. Farmers can host field days. When learning becomes visible and hands-on, sustainability stops sounding like a lecture and starts feeling like a community skill.</p>

<p>There are also risks to manage. Poor seedlings can disappoint farmers. Monoculture can reduce biodiversity. Weak market planning can leave producers with unsold products. Lack of water or poor soil conditions can reduce yields. Climate events can damage young trees. That is why AFRICOCO's climate work should be tied to training, monitoring, partnerships, and realistic timelines. Coconut trees take patience. They reward communities that think beyond one season and plan across generations.</p>

<p>The future of climate resilience in Africa will be built by people who combine local intelligence with global awareness. A farmer's experience, a scientist's research, a youth entrepreneur's creativity, a traditional leader's memory, a sponsor's resources, and a community's discipline all have roles to play. Coconut trees can stand at the center of that collaboration: rooted in heritage, useful in the present, and generous toward the future. If we plant them wisely, process them creatively, and protect the ecosystems around them, coconut can become one of Africa's most beautiful climate stories.</p>
HTML
            ],
            [
                'category' => 'agro-tourism',
                'title' => 'AgunkeFest and the Rise of Coconut Heritage Tourism in Africa',
                'slug' => 'agunkefest-rise-of-coconut-heritage-tourism-africa',
                'featured_image' => '/images/blog/coconut-oil-mill-processing.jpg',
                'excerpt' => 'AgunkeFest can become more than a festival: it can be a destination brand connecting culture, agriculture, food, enterprise, research, and global visitors.',
                'seo_title' => 'AgunkeFest and Coconut Heritage Tourism in Africa',
                'seo_description' => 'Explore how AgunkeFest can grow coconut heritage tourism in Africa by connecting culture, agriculture, food, enterprise, festivals, and international visitors.',
                'published_at' => now()->subDay(),
                'body' => <<<'HTML'
<p>Every destination needs a story people can remember. Some places are known for mountains, some for music, some for monuments, some for food, and some for festivals that make visitors say, "I need to be there next year." Badagry already carries deep historical and cultural significance, and AFRICOCO is adding another layer to that identity through coconut heritage. AgunkeFest can become a festival where agriculture meets culture, where farmers meet investors, where families meet food experiences, and where local pride meets international curiosity. That is the heart of coconut heritage tourism.</p>

<p>Tourism is not only about sightseeing. The best tourism is participation. Visitors want to taste, learn, photograph, listen, laugh, shop, and return home with a story. Coconut offers all of these. A visitor can drink fresh coconut water, watch oil being pressed, learn how husk becomes fiber, taste coconut-based meals, buy handmade crafts, plant a seedling, attend a cultural performance, listen to farmers, and understand why the crop matters to coastal communities. Suddenly, a coconut is not just something sold by the roadside. It becomes a passport into ecology, enterprise, history, and hospitality.</p>

<p>AgunkeFest has the potential to organize that experience into a destination product. Imagine a festival program with farmer exhibitions in the morning, school competitions by midday, food tastings in the afternoon, cultural performances at sunset, and business networking in the evening. Add guided tours to coconut farms, boat experiences, heritage walks, youth innovation pitches, beauty and wellness showcases, and training sessions for small businesses. The festival becomes both entertaining and useful. People come for celebration and leave with contacts, knowledge, products, and emotional attachment.</p>

<p>Internationally, food and agricultural festivals have helped destinations become more visible. Wine regions use harvest festivals. Coffee-growing communities use tasting tours. Chocolate destinations use farm-to-bar experiences. Rice, olive oil, mango, seafood, tea, and spices have all inspired tourism products around the world. Coconut deserves the same imagination in Africa. The difference is that AFRICOCO can build the story from an African perspective, honoring local farmers and culture instead of reducing the crop to a tropical decoration.</p>

<p>For local businesses, heritage tourism can open new income streams. A farmer can host a farm walk. A cook can create coconut recipes. A fashion designer can produce festival wear inspired by coconut landscapes. A photographer can sell festival portraits. A craft maker can turn shells into art. A youth media team can produce short documentaries. A hotel can create coconut-themed welcome packages. A transport operator can run shuttle routes. A school can participate through debates, essays, exhibitions, and science projects. Festivals work best when value spreads through the community rather than staying on a stage.</p>

<p>Research and policy also belong inside the festival. AgunkeFest can host practical forums on seedlings, climate resilience, processing standards, investment, tourism development, export readiness, and public-private partnerships. This is where the fun becomes serious without becoming boring. A good festival can carry music in one hand and market intelligence in the other. Farmers should not only dance; they should also leave with better information. Investors should not only take photographs; they should find credible projects. Students should not only attend; they should imagine careers.</p>

<p>Branding will be essential. AgunkeFest should have a consistent visual identity, clear dates, strong storytelling, official social media assets, a press kit, sponsor packages, visitor information, and a simple way for vendors to register. International visitors need early information about travel, accommodation, safety, transport, program highlights, and what makes the festival unique. Local visitors need affordability, accessibility, and reasons to bring family and friends. Sponsors need visibility and measurable impact. Media teams need quotable stories and good images. A festival becomes powerful when every stakeholder understands their role.</p>

<p>There is also a responsibility to protect authenticity. Heritage tourism should not turn culture into a costume or farmers into background decoration. The people who carry the heritage must benefit from the platform. Traditional knowledge should be respected. Local languages, food, music, and stories should be presented with dignity. Environmental impact should be managed. Waste should be reduced. Vendors should be guided on hygiene and pricing. Visitors should be welcomed warmly but also educated respectfully. The goal is not just a crowded event; the goal is a meaningful one.</p>

<p>AgunkeFest can become one of Africa's most memorable agro-tourism experiences if it grows with patience, quality, and community ownership. It can invite Lagos residents, Nigerians in the diaspora, African cultural travelers, researchers, development agencies, food lovers, environmental groups, and curious international visitors into one living story. That story says coconut is more than a crop. It is culture, climate, enterprise, cuisine, design, education, and identity. It can also give local children a reason to see their community as a place of innovation, not merely a place people leave behind. When a festival can make people learn while smiling, spend while supporting communities, and celebrate while building the future, it has become more than an event. It has become a movement.</p>
HTML
            ],
        ];

        foreach ($posts as $post) {
            $category = BlogCategory::where('slug', $post['category'])->first();

            BlogPost::updateOrCreate(
                ['slug' => $post['slug']],
                [
                    'blog_category_id' => $category?->id,
                    'title' => $post['title'],
                    'featured_image' => $post['featured_image'],
                    'excerpt' => $post['excerpt'],
                    'body' => $post['body'],
                    'author' => 'AFRICOCO Editorial Team',
                    'status' => 'published',
                    'published_at' => $post['published_at'],
                    'seo_title' => $post['seo_title'],
                    'seo_description' => $post['seo_description'],
                ]
            );
        }
    }
}
