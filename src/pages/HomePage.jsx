import { Link } from 'react-router-dom'

export default function HomePage() {
  return (
    <div className="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100">
      <header className="bg-white shadow-md sticky top-0 z-50">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 flex justify-between items-center">
          <h1 className="text-2xl font-bold text-gray-900">
            🎯 Learning Streak Tracker
          </h1>
          <div className="space-x-4">
            <Link
              to="/login"
              className="text-gray-700 hover:text-indigo-600 font-medium transition"
            >
              Login
            </Link>
            <Link
              to="/signup"
              className="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg transition"
            >
              Sign Up
            </Link>
          </div>
        </div>
      </header>

      <main className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        {/* Hero Section */}
        <div className="text-center mb-16">
          <h2 className="text-5xl font-bold text-gray-900 mb-4">
            Track Your Learning Journey Publicly
          </h2>
          <p className="text-xl text-gray-600 mb-8">
            A fast, scalable React app for tracking learning streaks. Build your streak,
            achieve your goals, and inspire others with your commitment to learning.
          </p>
          <Link
            to="/signup"
            className="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-4 px-8 rounded-lg text-lg transition transform hover:scale-105"
          >
            Get Started Free
          </Link>
        </div>

        {/* Features Section */}
        <div className="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
          <div className="bg-white rounded-lg shadow-lg p-8">
            <div className="text-5xl mb-4">🔐</div>
            <h3 className="text-2xl font-semibold text-gray-900 mb-3">Secure Authentication</h3>
            <p className="text-gray-600">
              Sign up safely and securely. Your learning data is always protected.
            </p>
          </div>

          <div className="bg-white rounded-lg shadow-lg p-8">
            <div className="text-5xl mb-4">🎯</div>
            <h3 className="text-2xl font-semibold text-gray-900 mb-3">Goal Creation</h3>
            <p className="text-gray-600">
              Set ambitious learning goals and track your progress towards mastery.
            </p>
          </div>

          <div className="bg-white rounded-lg shadow-lg p-8">
            <div className="text-5xl mb-4">📅</div>
            <h3 className="text-2xl font-semibold text-gray-900 mb-3">Daily Check-ins</h3>
            <p className="text-gray-600">
              Log your learning daily and build streaks that keep you motivated.
            </p>
          </div>

          <div className="bg-white rounded-lg shadow-lg p-8">
            <div className="text-5xl mb-4">👥</div>
            <h3 className="text-2xl font-semibold text-gray-900 mb-3">Public Profiles</h3>
            <p className="text-gray-600">
              Share your learning journey and inspire others in the community.
            </p>
          </div>

          <div className="bg-white rounded-lg shadow-lg p-8">
            <div className="text-5xl mb-4">⚡</div>
            <h3 className="text-2xl font-semibold text-gray-900 mb-3">Lightning Fast</h3>
            <p className="text-gray-600">
              Built with React & Vite for ultra-fast performance and responsiveness.
            </p>
          </div>

          <div className="bg-white rounded-lg shadow-lg p-8">
            <div className="text-5xl mb-4">🏆</div>
            <h3 className="text-2xl font-semibold text-gray-900 mb-3">Achievements</h3>
            <p className="text-gray-600">
              Earn badges and unlock achievements as you reach your learning milestones.
            </p>
          </div>
        </div>

        {/* Stats Section */}
        <div className="bg-white rounded-lg shadow-lg p-12 mb-16 text-center">
          <h2 className="text-4xl font-bold text-gray-900 mb-12">Join Our Learning Community</h2>
          <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
              <div className="text-5xl font-bold text-indigo-600">10K+</div>
              <p className="text-gray-600 mt-2 text-lg">Active Learners</p>
            </div>
            <div>
              <div className="text-5xl font-bold text-green-600">500K+</div>
              <p className="text-gray-600 mt-2 text-lg">Learning Hours Tracked</p>
            </div>
            <div>
              <div className="text-5xl font-bold text-blue-600">50K+</div>
              <p className="text-gray-600 mt-2 text-lg">Goals Completed</p>
            </div>
          </div>
        </div>

        {/* CTA Section */}
        <div className="bg-indigo-600 rounded-lg shadow-lg p-12 text-center text-white">
          <h2 className="text-4xl font-bold mb-4">Ready to Start Your Learning Streak?</h2>
          <p className="text-xl mb-8 opacity-90">
            Join thousands of learners tracking their progress and achieving their goals.
          </p>
          <Link
            to="/signup"
            className="bg-white text-indigo-600 font-bold py-3 px-8 rounded-lg hover:bg-gray-100 transition text-lg"
          >
            Sign Up Now
          </Link>
        </div>
      </main>

      <footer className="bg-gray-900 text-white mt-16 py-12">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
            <div>
              <h3 className="font-bold text-lg mb-4">Product</h3>
              <ul className="space-y-2 text-gray-400">
                <li><a href="#" className="hover:text-white transition">Features</a></li>
                <li><a href="#" className="hover:text-white transition">Pricing</a></li>
                <li><a href="#" className="hover:text-white transition">Security</a></li>
              </ul>
            </div>
            <div>
              <h3 className="font-bold text-lg mb-4">Company</h3>
              <ul className="space-y-2 text-gray-400">
                <li><a href="#" className="hover:text-white transition">About</a></li>
                <li><a href="#" className="hover:text-white transition">Blog</a></li>
                <li><a href="#" className="hover:text-white transition">Careers</a></li>
              </ul>
            </div>
            <div>
              <h3 className="font-bold text-lg mb-4">Resources</h3>
              <ul className="space-y-2 text-gray-400">
                <li><a href="#" className="hover:text-white transition">Help Center</a></li>
                <li><a href="#" className="hover:text-white transition">Documentation</a></li>
                <li><a href="#" className="hover:text-white transition">API</a></li>
              </ul>
            </div>
            <div>
              <h3 className="font-bold text-lg mb-4">Legal</h3>
              <ul className="space-y-2 text-gray-400">
                <li><a href="#" className="hover:text-white transition">Privacy</a></li>
                <li><a href="#" className="hover:text-white transition">Terms</a></li>
                <li><a href="#" className="hover:text-white transition">Contact</a></li>
              </ul>
            </div>
          </div>
          <div className="border-t border-gray-700 pt-8 text-center text-gray-400">
            <p>&copy; 2024 Learning Streak Tracker. All rights reserved.</p>
          </div>
        </div>
      </footer>
    </div>
  )
}
