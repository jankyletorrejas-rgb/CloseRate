<?php
session_start();
$isLoggedIn = isset($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CloseRate | Home</title>
	<script src="https://cdn.tailwindcss.com"></script>
	<style>
		body { font-family: system-ui, -apple-system, "Segoe UI", sans-serif; }
	</style>
</head>
<body class="bg-white text-black">

	<!-- Header -->
	<header class="border-b border-[#8B8181]">
		<nav class="max-w-6xl mx-auto px-6 py-6 flex items-center gap-6">
			<a href="home.php" class="text-4xl font-bold">CloseRate</a>
			<div class="flex-1"></div>

			<div class="hidden md:flex items-center gap-10 text-[22px]">
				<a href="home.php" class="text-[#4368E5] font-medium border-b-2 border-[#4368E5] pb-1">Home</a>
				<a href="listings.php" class="text-[#595959] hover:text-black">Listings</a>
				<a href="dashboard.php" class="text-black hover:text-[#4368E5]">Dashboard</a>
			</div>

			<?php if ($isLoggedIn): ?>
				<a href="logout.php" class="ml-4 text-base text-[#595959] hover:text-black">Log out</a>
			<?php else: ?>
				<div class="flex items-center gap-3 ml-4 text-base">
					<a href="index.php" class="text-[#595959] hover:text-black">Sign in</a>
					<a href="register.php" class="bg-[#4368E5] text-white px-4 py-2 rounded-[14px] hover:opacity-90">Sign up</a>
				</div>
			<?php endif; ?>
		</nav>

		<!-- Mobile nav -->
		<div class="md:hidden flex justify-center gap-8 pb-4 text-lg">
			<a href="home.php" class="text-[#4368E5] font-medium">Home</a>
			<a href="listings.php" class="text-[#595959]">Listings</a>
			<a href="dashboard.php">Dashboard</a>
		</div>
	</header>

	<main class="bg-[#F6F5F2]">

		<!-- Hero -->
		<section class="max-w-6xl mx-auto px-6 py-16 flex flex-col md:flex-row items-center gap-12">
			<div class="flex-1 flex flex-col gap-10">
				<div class="flex flex-col gap-4">
					<h1 class="text-4xl md:text-[40px] leading-tight max-w-[484px]">
						List it. Get real offers. Close the deal.
					</h1>
					<p class="text-xl">
						CloseRate is a marketplace built around negotiation. Set your price, field offers, and see what similar items actually sold for before you accept.
					</p>
				</div>
				<div class="flex flex-wrap items-center gap-5">
					<a href="listings.php" class="bg-[#4368E5] text-white text-xl py-[15px] px-6 rounded-[20px] border border-[#4368E5] hover:opacity-90">
						Browse listing
					</a>
					<a href="<?= $isLoggedIn ? 'sell.php' : 'index.php' ?>" class="bg-white text-black text-xl py-[15px] px-8 rounded-[20px] border border-[#636363] hover:bg-gray-50">
						Start Selling
					</a>
				</div>
			</div>

			<!-- Hero visual: offer meter preview (replaces the expiring Figma image) -->
			<div class="flex-1 w-full">
				<div class="bg-white rounded-[30px] border border-[#BFBABA] p-8 flex flex-col gap-5">
					<div class="flex items-center justify-between">
						<span class="text-xl">Offer on your listing</span>
						<span class="text-[#4368E5] text-2xl font-bold">$180</span>
					</div>
					<div>
						<div class="relative h-3 rounded-full bg-[#E7E4DF]">
							<div class="absolute left-[35%] w-[30%] h-3 bg-[#4368E5]/30"></div>
							<div class="absolute left-[52%] -top-1 w-5 h-5 rounded-full bg-[#4368E5] border-2 border-white"></div>
						</div>
						<div class="flex justify-between text-[13px] text-[#8B8181] mt-2">
							<span>Low</span>
							<span>Fair range</span>
							<span>High</span>
						</div>
					</div>
					<p class="text-[13px] text-[#8B8181]">Similar items typically sold for $165 to $195.</p>
					<div class="flex gap-3">
						<span class="flex-1 text-center bg-[#4368E5] text-white py-2 rounded-[14px]">Accept</span>
						<span class="flex-1 text-center bg-white border border-[#636363] py-2 rounded-[14px]">Counter</span>
						<span class="flex-1 text-center bg-white border border-[#636363] py-2 rounded-[14px]">Reject</span>
					</div>
				</div>
			</div>
		</section>

		<!-- Categories -->
		<section class="max-w-6xl mx-auto px-6 pb-16">
			<h2 class="text-[28px] mb-8">Browse by category</h2>
			<div class="grid grid-cols-2 md:grid-cols-4 gap-6">
				<?php
				$categories = [
					'Electronics' => '<rect x="3" y="4" width="18" height="12" rx="2"/><path d="M8 20h8M12 16v4"/>',
					'Furniture'   => '<path d="M5 11V8a2 2 0 012-2h10a2 2 0 012 2v3"/><path d="M3 15v-2a2 2 0 014 0v1h10v-1a2 2 0 014 0v2z"/><path d="M5 18v2M19 18v2"/>',
					'Kitchen'     => '<path d="M6 3v7a2 2 0 002 2v9M10 3v7a2 2 0 01-2 2M8 3v5"/><path d="M17 3c-2 1-3 4-3 7h3v11"/>',
					'Fashion'     => '<path d="M9 4l-6 4 3 3 2-1v10h8V10l2 1 3-3-6-4a3 3 0 01-6 0z"/>',
				];
				foreach ($categories as $name => $icon): ?>
					<a href="listings.php?category=<?= urlencode(strtolower($name)) ?>"
					   class="flex flex-col items-center bg-[#FFFDFD] py-[26px] gap-3 rounded-[30px] border border-[#BFBABA] hover:border-[#4368E5]">
						<svg class="w-[45px] h-[45px] text-[#4368E5]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><?= $icon ?></svg>
						<span class="text-xl"><?= htmlspecialchars($name) ?></span>
					</a>
				<?php endforeach; ?>
			</div>
		</section>

		<!-- How it works -->
		<section class="max-w-6xl mx-auto px-6 pb-16">
			<h2 class="text-[28px] mb-6">How CloseRate works</h2>
			<div class="grid grid-cols-1 md:grid-cols-3 gap-10">
				<?php
				$steps = [
					['List your item', 'Set a price, add photos and condition, and publish in under a minute.',
						'<path d="M12 5v14M5 12h14"/>'],
					['Field offers', 'Buyers can pay your asking price or make an offer, with a Fair Offer Meter showing what similar items typically sell for.',
						'<path d="M3 17l6-6 4 4 8-8"/><path d="M15 7h6v6"/>'],
					['Close the deal', 'Accept, reject, or counter, and message the buyer directly until you\'re both happy.',
						'<path d="M5 12l5 5 9-10"/>'],
				];
				foreach ($steps as [$title, $text, $icon]): ?>
					<div class="flex flex-col items-start gap-2">
						<svg class="w-[45px] h-[45px] text-[#4368E5]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><?= $icon ?></svg>
						<h3 class="text-xl"><?= htmlspecialchars($title) ?></h3>
						<p class="text-[#8B8181] text-[13px] max-w-[343px]"><?= htmlspecialchars($text) ?></p>
					</div>
				<?php endforeach; ?>
			</div>
		</section>
	</main>

	<!-- Footer -->
	<footer class="border-t-[3px] border-[#8B8181]">
		<div class="max-w-5xl mx-auto px-6 pt-5 pb-6">
			<div class="flex flex-col md:flex-row md:justify-between gap-8 mb-6">
				<div class="flex flex-col gap-2">
					<span class="text-base font-bold">CloseRate</span>
					<span class="text-[#8B8181] text-[11px] max-w-[157px]">A marketplace built around fair, transparent negotiation.</span>
				</div>
				<div class="flex gap-20">
					<div class="flex flex-col gap-2 text-sm">
						<span class="text-[15px] font-bold">MARKETPLACE</span>
						<a href="listings.php" class="hover:underline">Browse listings</a>
						<a href="sell.php" class="hover:underline">Sell an item</a>
					</div>
					<div class="flex flex-col gap-2 text-sm">
						<span class="text-[15px] font-bold">SUPPORT</span>
						<a href="help.php" class="hover:underline">Help Center</a>
						<a href="contact.php" class="hover:underline">Contact Us</a>
					</div>
				</div>
			</div>
			<div class="border-t border-[#BFBABA] pt-5 flex justify-between text-[11px]">
				<span>&copy; <?= date('Y') ?> CloseRate</span>
				<span><a href="terms.php" class="hover:underline">Terms</a> &middot; <a href="privacy.php" class="hover:underline">Privacy</a></span>
			</div>
		</div>
	</footer>

</body>
</html>